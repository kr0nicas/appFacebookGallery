<?php 
include('head.php');
include_once('includes/settings.php');
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
                <div id="heading-app" class="span12">
                    <p><h1 class="text-center">Date un Chance Vota x Vos</h1></p>
                    <p class="span2"></p>
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
                        <button onclick="like()" class='btn btn-primary like-btn' picID='<?php echo $picID;?>'><i class=''></i> Me gusta esta foto</button>
                        <a href="mediaLibrary.php" class="btn btn-info"><i class="icon-picture"></i> Ver galer&iacute;a</a>
                    </div>
                    <div class="text-center">
                        <div class='alert alert-success text-center' id='numLikes' style="width: 242px;"><b><?php echo $picRow->numLikes;?></b> me gusta</div>
                        <br />
                        <div class='alert fade in text-center' id='messageDiv' style='display:none;width: 242px;'><a class='close' data-dismiss='alert' href='#'>&times;</a></div>                              
                    </div>
                </div>
                </div>
                
                <script type="text/javascript">
                        function like()
                        {                              
                            $.ajax({
                                type: "POST",
                                url: "picLike.php",
                                data: {picID: $('.like-btn').attr('picID')},
                                success: function(responseText)
                                {
                                    if (responseText == "err0")
                                    {
                                        var msg='No se pudo realizar el like';
                                        $('#messageDiv').fadeOut('100');
                                        $('#messageDiv').removeClass('alert-succes').addClass('alert-error').text(msg).fadeIn('100');                    
                                    }
                                    else if (responseText == "err2")
                                    {
                                        var msg='Ya le has dado like a esta foto';
                                        $('#messageDiv').fadeOut('100');
                                        $('#messageDiv').removeClass('alert-succes').addClass('alert-error').text(msg).fadeIn('100');
                                    }
                                    else
                                    {
                                        var msg='Gracias por tu like, invita a tus amigos';
                                        $('#messageDiv').fadeOut('100');
                                        $('#messageDiv').removeClass('alert-error').addClass('alert-succes').text(msg).fadeIn('100');
                                        $('#numLikes').fadeOut('100').fadeIn('100').html('<b>'+responseText+'</b> me gusta');
                                    }                                    
                                }                                                                
                            });     
                        }                        
		</script>                    
<?php include('footer.php') ?>
