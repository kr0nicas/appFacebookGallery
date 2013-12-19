<?php
include_once('DataBase.php');
$db=DataBase::getInstance();
$paginacion['total']=0;
$paginacion['nXp']=10;
$paginacion['current']=(isset($_GET['pag'])) ? $_GET['pag'] : 1;
?>
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
                <script src="js/bootstrap-paginator.min.js"></script>
	</head>

	<body>
  <div id="example"></div>
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
		<script>
			$(function() {
                            Grid.init();
                            var options = {
                                numberOfPages:10,
                                alignment: 'center',
                                size:"normal",
                                currentPage: <?php echo $paginacion['current'];?>,
                                totalPages: <?php echo $paginacion['np'];?>,
                                itemTexts: function (type, page, current) {
                                        switch (type) {
                                        case "first":
                                            return "<< Primera";
                                        case "prev":
                                            return "< Anterior";
                                        case "next":
                                            return "Siguiente >";
                                        case "last":
                                            return "&Uacute;ltima >>";
                                        case "page":
                                            return page;
                                        }
                                    },
                                    useBootstrapTooltip:true,
                                         tooltipTitles: function (type, page, current) {
                                             switch (type) {
                                             case "first":
                                                 return "Ir a la primera p&aacute;gina <i class='icon-fast-backward icon-white'></i>";
                                             case "prev":
                                                 return "Ir a la p&aacute;gina anterior <i class='icon-backward icon-white'></i>";
                                             case "next":
                                                 return "Ir a la p&aacute;gina siguiente <i class='icon-forward icon-white'></i>";
                                             case "last":
                                                 return "Ir a la &uacute;ltima p&aacute;gina <i class='icon-fast-forward icon-white'></i>";
                                             case "page":
                                                 return "Ir a la p&aacute;gina  " + page + " <i class='icon-file icon-white'></i>";
                                             }
                                         },
                                         bootstrapTooltipOptions: {
                                             html: true,
                                             placement: 'bottom'
                                         },
                                        onPageClicked: function(e,originalEvent,type,page){
                                            window.location='pruebita.php?pag='+page
                                        }                                             
                            }
                            $('#example').bootstrapPaginator(options);           
			});
		</script>

	</body>

	</html>
