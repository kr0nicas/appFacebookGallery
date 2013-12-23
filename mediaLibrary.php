<?php include('head.php') ?>
			<a href="index.php"><i class="icon-arrow-left"></i> Back to image uploader.</a>
			<?php

				include('includes/settings.php');

				$result = mysqli_query($con, "SELECT * FROM " . $table_for_images . " ORDER BY id DESC");
				?>
			<div class="">
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
<?php include('footer.php') ?>
