<?php
/*
 * Clase para manejo de consultas en BD
 * PHP Version 5  
 */

////ini_set('display_errors', 1);
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
            $this->conexion = @mysql_connect("localhost","root","");
            $this->conexion = mysql_select_db("imageuploader")or die("Cannot select DB");
            $this->queries = 0;
            $this->resource = null;
	}

        public function execute_query($sql) 
        {	   
            $RESP=mysql_query($sql,$this->conexion); 
            return $RESP;
        }//fin del metodo query
                
	public function execute()
        {		            
            if(!($this->resource = mysql_query($this->sql, $this->conexion)))
            {
                    return null;
            }
            $this->queries++;
                                
            return $this->resource;
	}


        public function count()
        {
            $resource = mysql_query($this->sql, $this->conexion);
            $cuantos = mysql_num_rows($resource);
            return $cuantos;
	}
       
        
	public function alter()
        {
            if(!($this->resource = mysql_query($this->sql, $this->conexion)))
            {
                    return false;
            }
            return true;
	}
        
        public function getFullGallery(&$paginacion,$orderBy='id DESC')
        {
            $paginacion['total']=$this->count();
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $end=$begin + $paginacion['nXp'];
            $sql="SElECT * FROM images ORDER BY $orderBy LIMIT $begin,$end";
            $this->setQuery($sql);
            return $this->loadObjectList();
        }
        
        public function getLastEntries(&$paginacion,$orderBy='id DESC', $n=40)
        {
            $paginacion['total']=$n;
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $end=$begin + $paginacion['nXp'];
            $sql="SElECT * FROM images ORDER BY $orderBy LIMIT $begin,$end";
            $this->setQuery($sql);
            return $this->loadObjectList();            
        }
        
        public function getMoreLiked(&$paginacion,$orderBy='likes DESC', $n=40)
        {
            $paginacion['total']=$n;
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $end=$begin + $paginacion['nXp'];
            $sql="SElECT * FROM images ORDER BY $orderBy LIMIT $begin,$end";
            $this->setQuery($sql);
            return $this->loadObjectList();            
        }        

	public function loadObjectList()
        {
            if (!($cur = $this->execute()))
            {
                    return null;
            }
            $array = array();
            while ($row = @mysql_fetch_object($cur))
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
            @mysql_free_result($this->resource);
            return true;
	}

	public function loadObject()
        {
            if ($cur = $this->execute())
            {
                if ($object = mysql_fetch_object($cur))
                {
                        @mysql_free_result($cur);
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
            @mysql_free_result($this->resource);
            @mysql_close($this->conexion);
	}
}
?>
