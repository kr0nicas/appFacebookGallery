<?php
$sgbd='mysql';   // Puede ser "postgres" o "mysql"
$host='imagesuploader.db.10794365.hostedresource.com';  //El host de la base de datos
$port='3306';  // Puerto del host para la base de datos
$db='imagesuploader'; // Nombre de la base de datos
$usr='imagesuploader';  // Usuario de la base de datos
$pssw='APPfb2014@';  // Password de la base de datos

//$sgbd='postgres';
//$host='localhost';
//$port='5432';
//$db='imageuploader';
//$usr='postgres';
//$pssw='tulito';


//$host='localhost';
//$port='3600';
//$db='imageuploader';
//$usr='root';
//$pssw='tulito';

//$host='ec2-54-204-16-70.compute-1.amazonaws.com';
//$port='5432';
//$db='d4g2r0uh9aphfp';
//$usr='tpvoqltvyqvscw';
//$pssw='Owasxi5r0iMTt3pXJyyus-5pCQ';

$prev=(trim($prev) != '') ? $prev : '';

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