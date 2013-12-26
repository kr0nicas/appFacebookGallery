<?php
ini_set('display_errors','1');
$prev='../../';
include_once('../../includes/settings.php');

function sanitizar(&$valor,$llave)
{
    $valor=strip_tags($valor);    
    $valor=stripslashes($valor);
}

array_walk($_POST, 'sanitizar');//filtra etiquetas

if(isset($_POST['usrName']) && isset($_POST['password']))
{
    $login=$db->login($_POST['usrName'], $_POST['password']);
//    if(($login != null) || ($_POST['usrName'] == 'admin' && $_POST['password'] == 'admin'))
    if($login != null)
    {
        session_start();
        $_SESSION['usr']=$login;      
        $_SESSION['connected']=TRUE;  
        header('location:../administration.php');    
    }
    else
    {
        header('location:../index.php');
    }
    
}
else
{
    header('location:../index.php');
}
?>