<?php

    if(isset($_GET['error']))  {

      switch($_GET['error']) {
        case 1:
          $text = "No se pudo guardar la foto en la base de datos.";
          break;
        case 2:
          $text = "Archivo de imagen no válido.";
          break;
        case 3:
          $text = "La foto ya existe.";
          break;
        case 4:
          $text = "La foto pesa más de 2 MB.";
          break;
        case 5:
          $text = "No se pudo subir la foto.";
          break;
        default:
          $text = "Unknown message code.";
          break;
      }

      $message = '<div class="alert alert-error fade in">' . $text . '
              <a class="close" data-dismiss="alert" href="#">&times;</a>
            </div>';

    } elseif (isset($_GET['status'])) {

      switch($_GET['status']) {
        case 1:
          $text = "Foto cargada con éxito!";
          break;
        default:
          $text = "Unknown message code.";
          break;
      }

      $message = '<div class="alert alert-success fade in">' . $text . '
              <a class="close" data-dismiss="alert" href="#">&times;</a>
            </div>';

    }

    if(isset($message)) {
      echo $message;
    }

?>