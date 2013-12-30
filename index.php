<?php
include_once('head.php');
?>
<div class="row-fluid">
    <div id="heading-app" class="span12">
        <h2 class="text-center">El poder está en mis manos</h2><br>
        <p><h1 class="text-center font-big">Date un Chance Vota x Vos</h1></p>
        <div class="hero-unit text-center well">
            Te invitamos a que subas una fotografía en la que demuestres que te das un chance y votar&aacute;s en las pr&oacute;ximas elecciones. Invita a otros j&oacute;venes a que se den un chance.
        </div>
    </div>
</div>
<div class="row-fluid">
    <div class="span12 content-app">
        <!-- Mensajes de error o validación -->
        <div class="messages text-center" id="message">
            <?php include('includes/messages.php'); ?>
        </div>
        <div class="row-fluid">
            <div class="span12">
                <div class="span4 hand-right">
                    <img src="img/hand-right.png" alt="">
                </div>
                <div class="span4 text-center">
                    <form method="post" action="upload.php" enctype="multipart/form-data"  id="form">
                        <div class="control-group">
                            <?php
                            if($exito !== TRUE)
                            {
                            ?>
                                <div class="controls">
                                    <?php
                                    if ($loguedin)
                                    {
                                        ?>
                                        <div class="fileinput fileinput-new">
                                            <div class="fileinput-new thumbnail">
                                                <img src="img/no-picture.png" alt="..." data-trigger="fileinput">
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" ></div>
                                            <span class="btn btn-primary btn-file">
                                                <span class="fileinput-new">Seleccione una foto</span>
                                                <span class="fileinput-exists ">Cambiar</span><input type="file" name="..."></span>
                                            <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remover</a>
                                        </div>
                                        <?php
                                    } else {
                                        echo "Para cargar tu fotografia, ingresa en el siguiente v&iacute;nculo: ";
                                        echo "<br /><br /><a href=" . $loginUrl . " target='_top' class='btn btn-default'>
                                            <img src='img/loguin.png'> Entrar</a> <br>";
                                    }
                                    ?>
                                </div>
                            <?php
                            }
                            else
                            {
                                if ($loguedin)
                                {
                                    $facebook->api('/me/feed', 'POST',
                                                                array(
                                                                'link' => 'https://apps.facebook.com/cloud_sv/',
                                                                'message' => 'Date un chance, vota por vos'
                                                            ));
                                }
                                ?>
                                    <div class="controls">
                                    <div class="fileinput fileinput-new">
                                        <div class="thumbnail">
                                            <img src="<?php echo $_GET['rutaFoto'];?>" >
                                        </div>
                                    </div>
                                    </div>
                                <?php
                            }
                            ?>
                        </div>
                </div>
                <div class="span4 hand-left">
                    <img src="img/hand-left.png" alt="">
                </div>
            </div>
            <hr />
            <div class="text-center">
                <?php
                if (($loguedin) && ($exito !== TRUE)) {
                    ?>
                    <button type="submit" class="btn btn-success" id="upload-btn"><i class="icon-circle-arrow-up icon-white"></i> Subir la foto</button>
                    <?php
                }
                ?>
                <a href="mediaLibrary.php" class="btn btn-info"><i class="icon-picture"></i> Ver la galer&iacute;a</a>
            </div>
            </form>
        </div>
    </div>
    <?php
    include('footer.php');
//        echo '<script type="text/javascript">
//        window.top.location = "https://apps.facebook.com/cloud_sv/";
//        </script>';
    ?>
