<?php
$sgbd='postgres';
$host='ec2-54-204-16-70.compute-1.amazonaws.com';
$port='5432';
$db='d4g2r0uh9aphfp';
$usr='tpvoqltvyqvscw';
$pssw='Owasxi5r0iMTt3pXJyyus-5pCQ';

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
