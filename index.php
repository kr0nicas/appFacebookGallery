<?php include('head.php') ?>
            <div class="row-fluid">
                <div id="heading-app" class="span12">
                    <h2 class="text-center">El poder está en mis manos</h2><br>
                    <p><h1 class="text-center font-big">¡YO SÍ VOTO!</h1></p>
                    <div class="hero-unit text-center">Sube tu Foto para confirmar
                     tu asistencia en estas Elecciones El Salvador 2014</div>
                     <?php echo "<a href=". $loginUrl .">Log in</a> <br>";
                      print_r($user_profile);
                      echo "<a href =" . $logoutUrl . "> Logout</a> <br>";
                      echo $user_profile['name'] . " " . $user_profile['id'] . " " .$user_profile['email'];
                     ?>
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
                                       <div class="controls">
                                           <div class="fileinput fileinput-new">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="img/no-picture.png" alt="..." data-trigger="fileinput">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" ></div>
                                                <span class="btn btn-primary btn-file"><span class="fileinput-new">Seleccione una foto</span>
                                                <span class="fileinput-exists ">Cambiar</span><input type="file" name="..."></span>
                                                <a href="#" class="btn btn-warning fileinput-exists" data-dismiss="fileinput">Remover</a>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                               <div class="span4 hand-left">
                                   <img src="img/hand-left.png" alt="">
                               </div>
                        </div>
                    <hr />
                    <div class="text-center">
                            <button type="submit" class="btn btn-success" id="upload-btn"><i class="icon-circle-arrow-up icon-white"></i> Subir la foto</button>
                            <a href="mediaLibrary.php" class="btn btn-info"><i class="icon-picture"></i> Media Library</a>
                    </div>
                </form>
                </div>
                </div>
<?php include('footer.php') ?>
