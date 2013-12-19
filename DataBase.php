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

	public static function getInstance(){
		if (is_null (self::$_singleton)) {
			self::$_singleton = new DataBase();
		}
		return self::$_singleton;
	}

	private function __construct(){
            /*  $link=mssql_connect("172.21.10.10","usrppto","usrbudget2012");
                mssql_select_db("Presupuesto",$link);
             */
		
                // $this->conexion = @mssql_connect("172.21.10.10","usrppto","usrbudget2012");
                ////@mssql_connect(DIRECCION,USUARIO,CONTRASENA );//
		//$this->conexion = mssql_select_db("Presupuesto")or die("Cannot select DB");
                //$this->$conexionbd = mssql_select_db("Presupuesto",$this->conexion);
                $this->queries = 0;
		$this->resource = null;
	}

       public function execute_query($sql) {

	            //$this->conexion = @mssql_connect("172.21.10.10","usrppto","usrbudget2012");	   
                    $RESP=mssql_query($sql,$this->conexion); 
                    return $RESP;
		}//fin del metodo query
                
	public function execute(){
		
           $this->conexion = @mssql_connect("172.21.10.10","usrppto","usrbudget2012");   
           
            if(!($this->resource = mssql_query($this->sql, $this->conexion))){
			return null;
		}
		$this->queries++;
                                
		return $this->resource;
	}


        public function count(){
                echo 'Mori1<br>';
		echo $resource = mssql_query($this->sql, $this->conexion);
                print_r($resource);
                echo '<br>Mori2<br>';
		echo $cuantos = mssql_num_rows($resource);
		return $cuantos;
	}
       
        
	public function alter(){
		if(!($this->resource = mssql_query($this->sql, $this->conexion))){
			return false;
		}
		return true;
	}

	public function loadObjectList()
        {
		if (!($cur = $this->execute())){
			return null;
		}
		$array = array();
		while ($row = @mssql_fetch_object($cur)){
			$array[] = $row;
		}
		return $array;
	}

	public function setQuery($sql)
        {
	     if(empty($sql)){
			return false;
		}
		$this->sql = $sql;
		return true;
	}

	public function freeResults(){
		@mssql_free_result($this->resource);
		return true;
	}

	public function loadObject()
        {
		if ($cur = $this->execute()){
			if ($object = mssql_fetch_object($cur)){
				@mssql_free_result($cur);
				return $object;
			}
			else {
				return null;
			}
		}
		else {
			return false;
		}
	}

	function __destruct(){
		@mssql_free_result($this->resource);
		@mssql_close($this->conexion);
	}
}
?>
