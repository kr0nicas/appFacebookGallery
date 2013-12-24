<?php
ini_set('display_errors','1');
$prev='../';
include_once('../includes/settings.php');
$picID=$_POST['picID'];
if($db->approvePic($picID))
{
    echo '1';
}
else
{
    echo '0';
}
?>
