            </div>
               <div class="span12 footer-app text-center">
                    Una campaña por www.fundaspad.org | Elecciones El Salvador
               </div>
        </div>
        <?php
        $prev=(trim($prev) != '') ? $prev : '';
        ?>
        <script src="<?php echo $prev;?>js/grid.js"></script>
        <script>
            $(function() {
                Grid.init();
            });
        </script>
    </body>

</html>
