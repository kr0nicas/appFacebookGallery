<?php
//ini_set('display_errors','1');
session_start();
if($_SESSION['connected'] !== TRUE)
{
    header('location:index.php');
}
$prev='../';
include_once('../includes/settings.php');
$paginacion['total']=0;
$paginacion['nXp']=5;
$paginacion['current']=1;
$db->cuentaFullGallery($paginacion, FALSE);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>¡Yo sí voto!</title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link rel="stylesheet" type="text/css" href="../css/jasny-bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="../css/default.css" />
        <link rel="stylesheet" type="text/css" href="../css/component.css" />
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/style-faceApp.css" />

        <script type="text/javascript" src="../js/jquery.min.js"></script>
        <script type="text/javascript" src="../js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/jasny-bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/scripts.js"></script>
        <script type="text/javascript" src="../js/scriptsUpload.js"></script>
        <script src="../js/modernizr.custom.js"></script>
        <script src="../js/bootstrap-paginator.min.js"></script>
    </head>

    <body>

        <div class="container well">
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
                                            $("#divGrid").html('<div class="text-center"><br><br><img src="../img/ajax-loader.gif" /></div>');
                                            $("#divGrid").load('list.php?pag='+page,function(){
                                                $('#paginator').slideDown('100');
                                            });
                                        }                                             
                            }
                            <?php
                            if($paginacion['total'] > 0)
                            {
                            ?>
                                $('#paginator').bootstrapPaginator(options);
                                $('#paginator').slideUp('100');
                                $("#divGrid").html('<div class="text-center"><br><br><img src="../img/ajax-loader.gif" /></div>');
                                $("#divGrid").load('list.php?pag=1',function(){
                                    $('#paginator').slideDown('100');
                                });
                            <?php
                            }
                            ?>
			});
		</script>
                <a href="administration.php"><i class="icon-arrow-left"></i> Regresar al men&uacute; de administraci&oacute;n.</a>                            

			<div class="">
                            <h1 class="text-center">Galeria de imágenes pendientes de aprobaci&oacute;n</h1>
                                <div id="paginator"></div>
                                <div id="divGrid"></div>


<?php include('../footer.php') ?>