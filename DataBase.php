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

	public static function getInstance($host,$port,$db,$usr,$pssw)
        {
            if(is_null(self::$_singleton)) 
            {
                    self::$_singleton = new DataBase($host,$port,$db,$usr,$pssw);
            }
            return self::$_singleton;
	}

	private function __construct($host,$port,$db,$usr,$pssw)
        {
            $this->conexion = mysql_connect("$host:$port",$usr,$pssw)or die(mysql_error());
            mysql_select_db($db)or die("Cannot select DB");
            self::$queries = 0;
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
            self::$queries++;
                                
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
        
        public function login($userName, $password)
        {
            $pass= hash('sha256', $password);            
            
            $sql="SElECT * FROM users WHERE user_name ='$userName' AND user_password='$pass'";
            $this->setQuery($sql);
            return $this->loadObject();                          
            //return null;
        }        
        
        public function getFullGallery(&$paginacion,$orderBy='id DESC',$approved=TRUE)
        {
            $approved=($approved) ? '1' : '0';
            
            $sqlCount="SELECT * FROM images WHERE img_approved=$approved";
            $this->setQuery($sqlCount);            
            $paginacion['total']=$this->count();
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $sql="SElECT * FROM images WHERE img_approved=$approved ORDER BY $orderBy LIMIT $begin,".$paginacion['nXp']; 
            //echo $sql;
            $this->setQuery($sql);
            return $this->loadObjectList();
        }
        
        public function cuentaFullGallery(&$paginacion, $approved=TRUE)
        {
            $approved=($approved) ? '1' : '0';
            
            $sqlCount="SELECT * FROM images WHERE img_approved=$approved ";
//              echo $sqlCount;
            $this->setQuery($sqlCount);            
            $paginacion['total']=$this->count();
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);            
        }
        
        public function getLastEntries(&$paginacion,$orderBy='id DESC', $n=40, $approved=TRUE)
        {    
            $approved=($approved) ? '1' : '0';
            
            $paginacion['total']=$n;
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $sql="SElECT * FROM images WHERE img_approved=$approved ORDER BY $orderBy LIMIT $begin,".$paginacion['nXp'];
            $this->setQuery($sql);
            return $this->loadObjectList();            
        }
        
        public function getMoreLiked(&$paginacion,$orderBy='likes DESC', $n=40, $approved=TRUE)
        {
            $approved=($approved) ? '1' : '0';
            
            $paginacion['total']=$n;
            $paginacion['np']= ceil($paginacion['total']/$paginacion['nXp']);
            $begin=$paginacion['nXp'] * ($paginacion['current']-1);
            $sql="SElECT * FROM images WHERE img_approved=$approved ORDER BY $orderBy LIMIT $begin,".$paginacion['nXp'];
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
            $sql="CREATE TABLE IF NOT EXISTS `images` (
                    `id` int(11) NOT NULL AUTO_INCREMENT,
                    `img_name` text NOT NULL,
                    `img_desc` text NOT NULL,
                    `img_loc` text NOT NULL,
                    `likes` int(11) DEFAULT NULL,
                    `fecha_hora_carga` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                    `img_approved` tinyint(4) NOT NULL DEFAULT '0',
                    `facebook_user_id` varchar(40) NOT NULL,
                    PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;";
            
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
        
        public function approvePic($picID)
        {
            $sql="UPDATE images SET img_approved=1 WHERE id=$picID";
            
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
        
        
        public function likePic($user_profile,$picID)
        {
            $facebook_user_id=$user_profile['id'];
            $facebook_user_email=$user_profile['email'];
            $sql="INSERT INTO likes(facebook_user_id,id,like_active,email) VALUES('$facebook_user_id',$picID,1,'$facebook_user_email')";
            
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
        
        public function alreadyLikePic($user_profile,$picID)
        {
            $facebook_user_id=$user_profile['id']; 
            $sql="SELECT * FROM likes WHERE facebook_user_id='$facebook_user_id' AND like_active=1 AND id=$picID";
            
            $this->setQuery($sql);
            if($this->count() > 0)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }            
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
