<?php

ini_set('display_errors', '1');
include_once('includes/settings.php');
//$db=DataBase::getInstance();
//require('includes/settings.php');

//valida el tipo que sea una imagen
if ((($_FILES["img_file"]["type"] == "image/gif") || ($_FILES["img_file"]["type"] == "image/jpeg") || ($_FILES["img_file"]["type"] == "image/jpg") || ($_FILES["img_file"]["type"] == "image/pjpeg") || ($_FILES["img_file"]["type"] == "image/x-png") || ($_FILES["img_file"]["type"] == "image/png"))) {

    if ($_FILES["img_file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["img_file"]["error"] . "<br>";
    } else {
        // Validación del tamaño de la imagen
        $peso = $_FILES['img_file']['size'];
        if ($peso > 2097152) {
            header('Location: index.php?error=4');
        } else {
            $_FILES["img_file"]["name"] = uniqid('photo_');
            //Validacion que la imagen no exista con el mismo nombre
            if (file_exists("uploads/" . $_FILES["img_file"]["name"])) {
                header('Location: index.php?error=3');
            } else {
                if (move_uploaded_file($_FILES["img_file"]["tmp_name"], "uploads/" . $_FILES["img_file"]["name"])) {
                    $data = Array('name' => $_FILES["img_file"]["name"]);
                    if ($db->insertRow($data)) {
                        $rutaFoto="uploads/" . $_FILES["img_file"]["name"];
                        header('Location: index.php?status=1&rutaFoto='.$rutaFoto);
                    } else {
                        header('Location: index.php?error=1');
                    }
                } else {
                    header('Location: index.php?error=5');
                }
            }
        }
        //$mime=mime_content_type($_FILES["img_file"]["tmp_name"]);
    }
} else {
    //    print_R($_FILES);
    header('Location: index.php?error=2');
}

