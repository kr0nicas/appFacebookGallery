<!DOCTYPE html>
<?php 
//ini_set('display_errors', '1');
require_once 'src/facebook.php';
    $facebook = new Facebook(array(
        'appId'  => '1429268330635891',
        'secret' => '36f3d6a223c3aeee7c1e7950be654d98',
));

// Get User ID
$user = $facebook->getUser();
if($user) 
{
    $loguedin=TRUE;
    try 
    {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
        print_r($user_profile);    
        $logoutUrl = $facebook->getLogoutUrl();
    } 
    catch (FacebookApiException $e) 
    {
        error_log($e);
        $user = null;
    }
    
    //echo "<a href =" . $logoutUrl . "> Logout</a> <br>";
}
else
{
    $loguedin=FALSE;
    //print_r($user_profile);    
    //echo $user_profile['name'] . " " . $user_profile['id'] . $user_profile['email'];
                       
    
    $params = array('scope' => 'friends_likes, email',
                    );
    
    $statusUrl = $facebook->getLoginStatusUrl();
    $loginUrl = $facebook->getLoginUrl($params);
}
$loguedin=TRUE;
?>
<html>
    <head>
        <title>¡Yo sí voto!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/default.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <link href="css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style-faceApp.css" />

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
        <script type="text/javascript" src="js/scriptsUpload.js"></script>
        <script src="js/modernizr.custom.js"></script>
        <script src="js/bootstrap-paginator.min.js"></script>
    </head>

    <body>

        <div class="container well">
