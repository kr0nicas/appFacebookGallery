<?php 
include('head.php');
include_once('DataBaseP.php');
$db=DataBase::getInstance();
//$picID = base64_decode($_GET['picID']);
$picID = $_GET['picID'];
$picRow=$db->getOne($picID);
if(count($picRow) == 0)
{
    die('No existe la fotografía buscada');
}
//print_R($picRow);
?>
            <div class="row-fluid">
                <div class="span12">
                    <h2 class="text-center">El poder esta en mis manos</h2><br>
                    <p><h1 class="text-center font-big">¡YO SÍ VOTO!</h1></p>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span12">
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
                                   <div class="control-group">
                                       <div class="controls">
                                           <div class="fileinput fileinput-new">
                                                <div class="fileinput-new thumbnail">
                                                    <img src="<?php echo $picRow->img_loc;?>" alt="..." data-trigger="fileinput">
                                                </div>
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
<!--                            <button type="submit" class="btn btn-success" id="upload-btn"><i class="icon-circle-arrow-up icon-white"></i> Subir la foto</button>-->
                        <a href="mediaLibrary.php" class="btn btn-info"><i class="icon-picture"></i> Ver la galer&iacute;a completa</a>
                    </div>
                </div>
                </div>
<?php include('footer.php') ?>
