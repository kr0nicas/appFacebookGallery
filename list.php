<?php
include_once('includes/settings.php');
$paginacion['total'] = 0;
$paginacion['nXp'] = 5;
$paginacion['current'] = (isset($_GET['pag'])) ? $_GET['pag'] : 1;
?>
<!--		<div class="container">-->
<?php
$result = $db->getFullGallery($paginacion, $orderBy = 'id DESC', TRUE);
?>
<div class="main og-grid">
    <ul id="og-grid" class="og-grid">
        <?php
        foreach ($result as $row) {
            $desc = '<div class="fb-share-button" data-href="http://apps.facebook.com/cloud_sv/picViewer.php?picID=' . $row->id . '" data-type="box_count"></div>';
            //$desc="<a href='#' >prueba</a>";
            echo '<li><a href="' . $row->img_loc . '" data-largesrc="' . $row->img_loc . '" data-title="Descripci&oacute;n" data-description=" '. $desc .' ">'
                    . '<img src="' . $row->img_loc . '" alt="' . $row->img_loc . '"/></a>
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
        $('#backtotop').on('click', function() {
            $('html, body').animate({scrollTop: 0}, 'slow');
            return false;
        });
    });
</script>                
