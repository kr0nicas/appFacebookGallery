<!DOCTYPE html>

<html>
	<head>
		<title>Image Uploader</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
                <link rel="stylesheet" type="text/css" href="css/jasny-bootstrap.min.css" />

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
                <script type="text/javascript" src="js/jasny-bootstrap.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
                <script type="text/javascript" src="js/scriptsUpload.js"></script>
	</head>

	<body>

		<div class="container well">

			<h1 class="text-center">Sube tu foto</h1>

			<div class="span8 offset2">

				<div class="messages text-center" id="message">
					<?php include('includes/messages.php'); ?>
				</div>

				<form method="post" action="upload.php" enctype="multipart/form-data" class="form-horizontal" id="form">

<!--					<legend>Sube tu Foto</legend>-->

					<!-- <div class="control-group">
						<label class="control-label" for="img_name">Nombre de la Foto : </label>
						<div class="controls">
							<input type="text" name="img_name" id="img_name" required/><br />
						</div>
					</div> -->

					<div class="control-group">
						<label class="control-label" for="file">Foto : </label>
						<div class="controls">
                                                    <div class="fileinput fileinput-new" >
                                                      <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="img/no-picture.png" alt="..." data-trigger="fileinput">
                                                      </div>
                                                        <div class="fileinput-filename ">
                                                        </div>
                                                      <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                                      <div>
                                                        <span class="btn btn-default btn-file"><span class="fileinput-new">Seleccione una foto</span>
                                                        <span class="fileinput-exists">Cambiar</span><input type="file" name="..."></span>
                                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a>
                                                      </div>
                                                    </div>
						</div>
					</div>
					<div class="control-group">
                                                <label class="control-label" for="img_desc">Ingrese una descripci&oacute;n : </label>
						<div class="controls">
							<input type="text" name="img_desc" id="img_desc" required/><br />
						</div>
					</div>                                        
					<hr />

					<div class="text-center">
							<button type="submit" class="btn btn-primary" id="upload-btn"><i class="icon-circle-arrow-up icon-white"></i> Subir la foto</button>
							<a href="mediaLibrary.php" class="btn"><i class="icon-picture"></i> Media Library</a>
					</div>

				</form>

			</div>

		</div>
	</body>

</html>
