<?php
include_once('includes/settings.php');
$paginacion['total'] = 0;
$paginacion['nXp'] = 5;
$paginacion['current'] = (isset($_GET['pag'])) ? $_GET['pag'] : 1;
?>
<!--		<div class="container">-->
<<<<<<< HEAD
<?php
$result = $db->getFullGallery($paginacion, $orderBy = 'id DESC', TRUE);
?>
<div class="main og-grid">
    <ul id="og-grid" class="og-grid">
        <?php
        foreach ($result as $row) {
            $desc = "<a href='http://apps.facebook.com/cloud_sv/picViewer.php?picID=" . $row->id . "' </a>";
            //$desc="<a href='#' >prueba</a>";
            echo '<li><a href="' . $row->img_loc . '" data-largesrc="' . $row->img_loc . '" data-title="Descripci&oacute;n" data-description=" '. $desc .' ">'
                    . '<img src="' . $row->img_loc . '" alt="' . $row->img_loc . '"/></a>
                    </li>';
        }
        ?>
    </ul>
</div>
</div>
=======
			<?php
				$result=$db->getFullGallery($paginacion,$orderBy='id DESC',TRUE);
                        ?>
			<div class="main og-grid">
				<ul id="og-grid" class="og-grid">
					<?php                                               
						foreach($result as $row)	
                                                {
//                                                    $desc="
//                                                        <div id='fb-root'></div>
//                                                        <script>(function(d, s, id) {
//                                                        var js, fjs = d.getElementsByTagName(s)[0];
//                                                        if (d.getElementById(id)) return;
//                                                        js = d.createElement(s); js.id = id;
//                                                        js.src = '//connect.facebook.net/es_LA/all.js#xfbml=1&appId=1429268330635891';
//                                                        fjs.parentNode.insertBefore(js, fjs);
//                                                        }(document, 'script', 'facebook-jssdk'));</script>                                                        
//                                        <div class='fb-share-button' data-href='http://apps.facebook.com/cloud_sv/picViewer.php?picID=".$row->id." data-type='box_count'></div>
//                                            
//                                        icon-hand-up";
                                                    
                                                    $desc="<table>
                                                                    <script type='text/javascript'>
                                                                            $(function() {
                                                                                $('.like-btn').on('click',function(){
                                                                                    like();
                                                                                })
                                                                            });
                                                                    </script>                                                            
                                                                        <tr>
                                                                            <th colspan='2'>
                                                                            <br />
                                                                            <button type='submit' class='btn btn-primary like-btn' picID='".$row->id."'><i class='icon-hand-up icon-white'></i> Me gusta esta foto</button>
                                                                            </th>
                                                                        </tr>                                 
                                                                    </table";                                                    

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
>>>>>>> 2f2d1927a3b6d537734f501c1f5cfc3fac3da908

<div id="backtotop">
    <i class="icon-arrow-up icon-white"></i>
</div>

<<<<<<< HEAD
<script src="js/grid.js"></script>
<script type="text/javascript">
    $(function() {
        Grid.init();
        $('#backtotop').on('click', function() {
            $('html, body').animate({scrollTop: 0}, 'slow');
            return false;
        });
    });
</script>                
=======
		<script src="js/grid.js"></script>
                <script type="text/javascript">
			$(function() {
                            Grid.init();
                            $('#backtotop').on('click',function(){
                                    $('html, body').animate({scrollTop:0}, 'slow');
                                    return false;
                            });                            
			});
                        
                        function like()
                        {                              
                            $.ajax({
                                type: "POST",
                                url: "picLike.php",
                                data: {picID: $('.like-btn').attr('picID')},
                                success: function(responseText)
                                {
                                    alert(responseText);
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
>>>>>>> 2f2d1927a3b6d537734f501c1f5cfc3fac3da908
