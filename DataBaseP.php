<?php
/*
 * Clase para manejo de consultas en BD
 * PHP Version 5  
 */

ini_set('display_errors', 1);
class DataBase {
	private $conexion;
        //private $conexionbd;
	private $resource;
	private $sql;
	public static $queries;
	private static $_singleton;

	public static function getInstance()
        {
            if(is_null(self::$_singleton)) 
            {
                    self::$_singleton = new DataBase();
            }
            return self::$_singleton;
	}

	private function __construct()
        {
            $conn_string = "host=localhost port=5432 dbname=imageuploader user=postgres password=tulito";
            $this->conexion = pg_connect($conn_string);
            self::$queries = 0;
            $this->resource = null;
	}

        public function execute_query($sql) 
        {	   
            $RESP=pg_query($this->conexion, $sql); 
            return $RESP;
        }//fin del metodo query
                
	public function execute()
        {		            
            if(!($this->resource = pg_query($this->conexion,$this->sql)))
            {
                    return null;
            }
            self::$queries++;
                                
            return $this->resource;
	}


        public function count()
        {
            $resource = pg_query($this->conexion, $this->sql);
            $cuantos = pg_num_rows($resource);
            return $cuantos;
	}
       
        
	public function alter()
        {
            if(!($this->resource = pg_query($this->conexion, $this->sql)))
            {
                    return false;
            }
            return true;
	}
        
        public function login($userName, $password)
        {
            $pass= hash('sha256', $password);
            $sql="SElECT * users WHERE user_name ='$userName' AND user_password='$pass'";
            $this->setQuery($sql);
            //return $this->loadObject();                          
            return null;
        }
        
        public function getFullGallery(&$paginacion,$orderBy='id DESC')
        {
            $sqlCount="SELECT * FROM images";
            $this->setQuery($sqlCount);            
            $paginacion['total']=$this->count();
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $sql="SElECT * FROM images ORDER BY $orderBy LIMIT ". $paginacion['nXp']."  OFFSET ".$begin; 
//            echo $sql;
            $this->setQuery($sql);
            return $this->loadObjectList();
        }
        
        public function cuentaFullGallery(&$paginacion)
        {
            $sqlCount="SELECT * FROM images";
            $this->setQuery($sqlCount);            
            $paginacion['total']=$this->count();
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);            
        }
        
        public function getLastEntries(&$paginacion,$orderBy='id DESC', $n=40)
        {            
            $paginacion['total']=$n;
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $sql="SElECT * FROM images ORDER BY $orderBy LIMIT ". $paginacion['nXp']."  OFFSET ".$begin; 
            $this->setQuery($sql);
            return $this->loadObjectList();            
        }
        
        public function getMoreLiked(&$paginacion,$orderBy='likes DESC', $n=40)
        {
            $paginacion['total']=$n;
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $sql="SElECT * FROM images ORDER BY $orderBy LIMIT ". $paginacion['nXp']."  OFFSET ".$begin; 
            return $this->loadObjectList();            
        }   
        
        public function getOne($id)
        {
            $sql="SElECT * FROM images WHERE id='$id'";
            $this->setQuery($sql);
            return $this->loadObject();            
        }    
        
        public function createTable()
        {
            $sql="CREATE SEQUENCE IF NOT EXISTS  images_id_seq;

                    CREATE TABLE IF NOT EXISTS  images (
                                    id INTEGER NOT NULL DEFAULT nextval('images_id_seq'),
                                    img_name TEXT NOT NULL,
                                    img_desc TEXT NOT NULL,
                                    img_loc TEXT NOT NULL,
                                    likes INTEGER,
                                    fecha_hora_carga TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                    CONSTRAINT images_pk PRIMARY KEY (id)
                    );


                    ALTER SEQUENCE images_id_seq OWNED BY images.id;";
            $this->setQuery($sql);
            return $this->execute();            
        }  
        
        public function insertRow($data)
        {
            $sql="INSERT INTO images (img_name, img_loc)
                    VALUES('" . $data['name']. "','uploads/" . $data['name'] . "')";
            
            $this->setQuery($sql);
//              echo $sql;
            if($this->execute() == null)
            {
               return FALSE; 
            }
            else
            {
                return TRUE;
            }
        }          

	public function loadObjectList()
        {
            if (!($cur = $this->execute()))
            {
                    return null;
            }
            $array = array();
            while ($row = @pg_fetch_object($cur))
            {
                    $array[] = $row;
            }
            return $array;
	}

	public function setQuery($sql)
        {
	    if(empty($sql))
            {
                return false;
            }
            $this->sql = $sql;
            return true;
	}

	public function freeResults()
        {
            @pg_free_result($this->resource);
            return true;
	}

	public function loadObject()
        {
            if ($cur = $this->execute())
            {
                if ($object = pg_fetch_object($cur))
                {
                        @pg_free_result($cur);
                        return $object;
                }
                else 
                {
                        return null;
                }
            }
            else 
            {
                return false;
            }
	}

	function __destruct()
        {
            @pg_free_result($this->resource);
            @pg_close($this->conexion);
	}
}
?>
