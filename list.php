<?php
include_once('includes/settings.php');
$paginacion['total']=0;
$paginacion['nXp']=5;
$paginacion['current']=(isset($_GET['pag'])) ? $_GET['pag'] : 1;
?>
<!--		<div class="container">-->
			<?php
				$result=$db->getFullGallery($paginacion,$orderBy='id DESC',TRUE);
                        ?>
                        <div class="main og-grid">
				<ul id="og-grid" class="og-grid">
					<?php                                               
						foreach($result as $row)	
                                                {                                                  
                                                    $desc="<table>
                                                                    <script type='text/javascript'>
                                                                            $(function() {
                                                                                $('.like-btn').on('click',function(){                                                                                    
                                                                                    like();
                                                                                })
                                                                                
                                                                                $('.share-btn').on('click',function(){                                                                                    
                                                                                    share();
                                                                                })
                                                                            });
                                                                    </script>                                                            
                                                                        <tr>
                                                                            <th colspan='2'>
                                                                            <br />
                                                                            <button type='submit' class='btn btn-primary like-btn' picID='".$row->id."'><i class=''></i> Me gusta esta foto</button>
                                                                            <button type='submit' class='btn btn-primary share-btn' picID='".$row->id."' picLoc='".$row->img_loc."'><i class=''></i> Compartir</button>
                                                                            </th>
                                                                        </tr>                                 
                                                                    </table>";                                                    

                                                    echo '<li>
								<a href="'. $row->img_loc .'" data-largesrc="' . $row->img_loc  .'" data-title="Descripci&oacute;n" data-description="'.$desc.'">
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
                        
                        function share()
                        {
                            document.title = "This is the new page title.";
                            var picID=$('.share-btn').attr('picID');
                            var picLoc=$('.share-btn').attr('picLoc');
                            var myWindow = window.open("http://www.facebook.com/sharer/sharer.php?s=100&p[url]=https://apps.facebook.com/cloud_sv/picViewer.php?picID="+picID+"&p[images][0]=https://glacial-ridge-1341.herokuapp.com/uploads/"+picLoc+"&p[title]=Date%20un%20Chance%20Vota%20X%20vos!&p[summary]=Este%20Febrero%202014,%20Date%20un%20Chance%20y%20Vota%20X%20Vos,%20Invita%20a%20tus%20amigos%20a%20formar%20parte%20de%20este%20Derecho%20y%20deber%20de%20cada%20Salvadore%C3%B1o","","width=200,height=100");
                        }                        
                        
                        function like()
                        {                              
                            $.ajax({
                                type: "POST",
                                url: "picLike.php",
                                data: {picID: $('.like-btn').attr('picID')},
                                success: function(responseText)
                                {
                                    //alert(responseText);
                                    if(responseText == "1")
                                    {
                                        alert('like agregado');
                                    }
                                    else if(responseText == "2")
                                    {
                                        alert('ya le has dado like a esta foto');
                                    }
                                    else
                                    {
                                        alert('No se pudo realizar el like');
                                    }
                                }                                                                
                            });     
                        }                        
		</script>                
