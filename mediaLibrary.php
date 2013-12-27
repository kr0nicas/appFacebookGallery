<!DOCTYPE html>
<?php
include_once('includes/settings.php');
$paginacion['total']=0;
$paginacion['nXp']=5;
$paginacion['current']=1;
$db->cuentaFullGallery($paginacion, TRUE);
?>
<?php 
include('head.php');
if($loguedin)
{
    $id_user_facebook=$user_profile['id'];
 ?>
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
                                            $("#divGrid").html('<div class="text-center"><br><br><img src="img/ajax-loader.gif" /></div>');
                                            $("#divGrid").load('list.php?pag='+page+'&id_user_facebook=<?php echo $id_user_facebook?>',function(){
                                                $('#paginator').slideDown('100');
                                            });
                                        }                                             
                            }
                            $('#paginator').bootstrapPaginator(options);
                            $('#paginator').slideUp('100');
                            $("#divGrid").html('<div class="text-center"><br><br><img src="img/ajax-loader.gif" /></div>');
                            $("#divGrid").load('list.php?pag=1&id_user_facebook=<?php echo $id_user_facebook?>',function(){
                                $('#paginator').slideDown('100');
                            });
			});
		</script>
                <a href="index.php"><i class="icon-arrow-left"></i> Regresar a la carga de fotograf&iacute;a.</a>                            

			<div class="">
				<h1 class="text-center">Galeria de imágenes</h1>
                                <div id="paginator"></div>
                                <div id="divGrid"></div>


<?php 
}
else
{
    ?>
    <div class="text-center">
    <?php
    $params = array('scope' => 'friends_likes, email',
        'redirect_uri' => 'https://apps.facebook.com/cloud_sv/mediaLibrary.php',
    );

    $loginUrl = $facebook->getLoginUrl($params);
    
    echo "Para ver la galer&iacute;a de imagenes, ingresa en el siguiente v&iacute;nculo:  
    <br /><br /><a href=" . $loginUrl . " target='_top' class='btn btn-default'>
        <img src='img/loguin.png'> Entrar</a> <br>";
}
include('footer.php');

?>