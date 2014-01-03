<?php
include_once('includes/settings.php');
//$picID = base64_decode($_GET['picID']);
$picID = $_POST['picID'];
$picRow=$db->getOne($picID);
if(count($picRow) == 0)
{
    die('No existe la fotografía buscada');
}
else
{
    echo $picRow->numLikes;
}
?>
