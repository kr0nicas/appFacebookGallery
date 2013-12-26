<?php
$sgbd='mysql';   // Puede ser "postgres" o "mysql"
$host='imagesuploader.db.10794365.hostedresource.com';  //El host de la base de datos
$port='3306';  // Puerto del host para la base de datos
$db='imagesuploader'; // Nombre de la base de datos
$usr='imagesuploader';  // Usuario de la base de datos
$pssw='APPfb2014@';  // Password de la base de datos

//$host='localhost';
//$port='3600';
//$db='imageuploader';
//$usr='root';
//$pssw='tulito';

if($sgbd =='mysql')
{
    include_once($prev.'DataBase.php');   
}
else
{
    include_once($prev.'DataBaseP.php');
}
$db=DataBase::getInstance($host,$port,$db,$usr,$pssw);
//$db->createTable();
?>
