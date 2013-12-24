<html>
    <head>
        <title>¡Yo sí voto! Administraci&oacute;n</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../../css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../css/style-faceApp.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />

        <script type="text/javascript" src="../../js/jquery.min.js"></script>
        <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    </head>

    <body>

        <div class="container well">
            <div class="row-fluid">
                <div id="heading-app" class="span12">
<!--                    <h2 class="text-center">El poder está en mis manos</h2><br>-->
                    <h2 class="text-center well">Administraci&oacute;n de usuarios</h2><br>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12 content-app">
                    <!-- Mensajes de error o validación -->
                    <div class="messages text-center" id="message">
                        <?php //include('includes/messages.php'); ?>
                    </div>
                        <div class="row-fluid">
                            <div class="span12">
                                <div class="span4 hand-right">
                                    <img src="../../img/hand-right.png" alt="">
                                </div>
                               <div class="span4 text-center">
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-4 col-md-offset-4">
                                                        <h1 class="text-center login-title">Ingrese con sus credenciales</h1>
                                                        <div class="account-wall">
                                                            <img class="profile-img" src="../../img/no-picture.png" />
                                                            <form class="form-signin" method="POST" action="login.php">
                                                                <input type="text" name="usrName" class="form-control" placeholder="Nombre de usuario" required autofocus>
                                                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                                                <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>                           
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                               </div>
                               <div class="span4 hand-left">
                                   <img src="../../img/hand-left.png" alt="">
                               </div>
                        </div>
                    <hr />
                    <div class="text-center">
<!--                            <a href="mediaLibrary.php" class="btn btn-info"><i class="icon-picture"></i> Ver la galer&iacute;a</a>-->
                    </div>
                </form>
                </div>
                </div>
            </div>
               <div class="span12 footer-app text-center">
                    Una campaña por www.fundaspad.org | Elecciones El Salvador 2014
               </div>
    </body>

</html>

