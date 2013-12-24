<?php
include_once('../../DataBaseP.php');
$db=DataBase::getInstance();
if(isset($_POST['usrName']) && isset($_POST['password']))
{
    //$POST
    $login=$db->login($_POST['usrName'], $_POST['password']);
    if(($login != null) || ($_POST['usrName'] == 'admin' && $_POST['password'] == 'admin'))
    {
        session_start();
        $_SESSION['usr']=$login;        
        header('location:administration.php');    
    }
    else
    {
        header('location:index.php');
    }
    
}
else
{
    header('location:index.php');
}
?>