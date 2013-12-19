<!DOCTYPE html>

<html>
	<head>
		<title>Image Uploader</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/style.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>
		<script src="js/modernizr.custom.js"></script>


	</head>

	<body>

		<div class="container">
			<a href="index.php"><i class="icon-arrow-left"></i> Back to image uploader.</a>
			<?php

				include('includes/settings.php');

				$result = mysqli_query($con, "SELECT * FROM " . $table_for_images . " ORDER BY id DESC");
				?>
			<div class="main og-grid">
				<h1 class="text-center">Galeria de imágenes</h1>
				<ul id="og-grid" class="og-grid">
					<?php
						while($row = mysqli_fetch_array($result))	{
							echo '<li>
								<a href="'. $row['img_loc'] .'" data-largesrc="' . $row['img_loc'] .'" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
									<img src="'. $row['img_loc'] .'" alt="' . $row['img_loc'] .'"/>
								</a>
							</li>';
							}
					?>
					</ul>
			</div>
		</div>

		<div id="backtotop">
			<i class="icon-arrow-up icon-white"></i>
		</div>

		<script src="js/grid.js"></script>
		<script>
			$(function() {
				Grid.init();
			});
		</script>

	</body>

	</html>
