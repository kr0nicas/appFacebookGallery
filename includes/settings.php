<?php

	$host = "ec2-54-204-16-70.compute-1.amazonaws.com:5432";
	$user = "tpvoqltvyqvscw";
	$pass = "Owasxi5r0iMTt3pXJyyus-5pCQ";
	$dbname = "d4g2r0uh9aphfp";
	$table_for_images = "images";

	$con = mysqli_connect($host, $user, $pass, $dbname);

	if(mysqli_connect_errno($con))	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	$createTable = "CREATE TABLE IF NOT EXISTS `" . $table_for_images . "` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `img_name` text NOT NULL,
                        `img_desc` text NOT NULL,
                        `img_loc` text NOT NULL,
                        `likes` int(11) DEFAULT NULL,
                        `fecha_hora_carga` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`)
	                ) DEFAULT CHARSET=utf8";

	mysqli_query($con, $createTable) or die('Unable to create table : ' . mysqli_error($con));

?>
