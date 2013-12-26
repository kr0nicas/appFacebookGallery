<?php
ini_set('display_errors','1');
$prev='';
include_once('includes/settings.php');
require_once 'src/facebook.php';
    $facebook = new Facebook(array(
        'appId'  => '1429268330635891',
        'secret' => '36f3d6a223c3aeee7c1e7950be654d98',
));

// Get User ID
$user = $facebook->getUser();
try 
{    
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
//    $logoutUrl = $facebook->getLogoutUrl();
    //die($_POST['picID'].'asda');
    if(! $db->alReadyLikePic($user_profile,$picID))
    {
        if($db->likePic($user_profile,$picID))
        {
            echo '1';
        }
        else
        {
            echo '0';
        }  
    }
    else
    {
        echo '2';
    }    
} 
catch (FacebookApiException $e) 
{
    error_log($e);
    $user = null;
}

?>
