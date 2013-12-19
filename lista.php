<?php
include_once('DataBase.php');
$db=DataBase::getInstance();
$paginacion['total']=0;
$paginacion['nXp']=5;
$paginacion['current']=(isset($_GET['pag'])) ? $_GET['pag'] : 1;
?>
		<div class="container">
			<a href="index.php"><i class="icon-arrow-left"></i> Back to image uploader.</a>
			<?php
				$result=$db->getFullGallery($paginacion,$orderBy='id DESC');
                        ?>
			<div class="main og-grid">
				<h1 class="text-center">Galeria de imágenes</h1>
				<ul id="og-grid" class="og-grid">
					<?php
						foreach($result as $row)	{
							echo '<li>
								<a href="'. $row->img_loc .'" data-largesrc="' . $row->img_loc  .'" data-title="Azuki bean" data-description="Swiss chard pumpkin bunya nuts maize plantain aubergine napa cabbage soko coriander sweet pepper water spinach winter purslane shallot tigernut lentil beetroot.">
									<img src="'. $row->img_loc  .'" alt="' . $row->img_loc  .'"/>
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
                <script type="text/javascript">
			$(function() {
                            Grid.init();
                            $('#backtotop').on('click',function(){
                                    $('html, body').animate({scrollTop:0}, 'slow');
                                    return false;
                            });                            
			});
		</script>                
