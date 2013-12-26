<?php
ini_set('display_errors','1');
$prev='../';
include_once('../includes/settings.php');
$paginacion['total']=0;
$paginacion['nXp']=5;
$paginacion['current']=(isset($_GET['pag'])) ? $_GET['pag'] : 1;
?>
<!--		<div class="container">-->
			<?php
				$result=$db->getFullGallery($paginacion,$orderBy='id DESC',FALSE);
                        ?>
			<div class="main og-grid">
				<ul id="og-grid" class="og-grid">
					<?php
						foreach($result as $row)	
                                                {
                                                    $description="<table>
                                                                    <script type='text/javascript'>
                                                                            $(function() {
                                                                                $('.approve-btn').on('click',function(){
                                                                                    approve();
                                                                                })
                                                                            });
                                                                    </script>                                                            
                                                                        <tr>
                                                                            <th>Fecha de carga: </th>
                                                                            <td> ".$row->fecha_hora_carga."</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th colspan='2'>
                                                                            <br />
                                                                            <button type='submit' class='btn btn-success approve-btn' picID='".$row->id."'><i class='icon-ok icon-white'></i> Aprobar la fotograf&iacute;a</button>
                                                                            </th>
                                                                        </tr>                                 
                                                                    </table";
                                                    echo '<li>
                                                            <a href="../'. $row->img_loc .'" data-largesrc="../' . $row->img_loc  .'" data-title="Datos" data-description="'.$description.'">
                                                                    <img src="../'. $row->img_loc  .'" alt="../' . $row->img_loc  .'"/>
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

		<script src="../js/grid.js"></script>
                <script type="text/javascript">
			$(function() {
                            Grid.init();
                            $('#backtotop').on('click',function(){
                                    $('html, body').animate({scrollTop:0}, 'slow');
                                    return false;
                            });
			});
                        
                        function approve()
                        {
                            if(confirm('En realidad desea aprobar la fotografía ?'))
                            {                               
                                $.ajax({
                                    type: "POST",
                                    url: "picApprove.php",
                                    data: {picID: $('.approve-btn').attr('picID')},
                                    success: function(responseText)
                                    {
                                        if(responseText == "1")
                                        {
                                            window.location='picApproval.php'
                                        }
                                        else
                                        {
                                            
                                        }
                                    }                                                                
                                });     
                            }
                        }
		</script>                
