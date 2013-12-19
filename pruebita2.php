<!DOCTYPE html>
<?php
include_once('DataBase.php');
$db=DataBase::getInstance();
$paginacion['total']=0;
$paginacion['nXp']=5;
$paginacion['current']=1;
$db->cuentaFullGallery($paginacion);
?>
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
                <div id="paginator"></div>
		<div id="divGrid">
                    
		</div>
		
                <script type="text/javascript">
			$(function() {
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
                                            //window.location='pruebita.php?pag='+page
                                            $('#paginator').slideUp('100');
                                            $("#divGrid").html('CARGANDO...');
                                            $("#divGrid").load('lista.php?pag='+page,function(){
                                                $('#paginator').slideDown('100');
                                            });
                                        }                                             
                            }
                            $('#paginator').bootstrapPaginator(options);
                            $('#paginator').slideUp('100');
                            $("#divGrid").html('CARGANDO...');
                            $("#divGrid").load('lista.php?pag=1',function(){
                                $('#paginator').slideDown('100');
                            });
			});
		</script>
	</body>

	</html>
