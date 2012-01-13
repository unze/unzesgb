<?php
// Revision: 1.1
// Name: number.php

// read number from uri parameter
$id = $_GET['id']; // Danke an dax-core
$number_encrypted_encoded = $id;

// decode number
$number_encrypted=rawurldecode($number_encrypted_encoded);

$key = "p2C9s+kA41o7Dq6a";
$td = mcrypt_module_open(MCRYPT_3DES, '', MCRYPT_MODE_ECB, '');
$iv = mcrypt_create_iv (mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
mcrypt_generic_init($td, $key, $iv);
$number=mdecrypt_generic($td, $number_encrypted);
mcrypt_generic_deinit($td);
mcrypt_module_close($td);

// create image
$WIDTH = 44;
$HEIGHT = 20;
$image = @imagecreatetruecolor($WIDTH, $HEIGHT) or die("Cannot Initialize new GD image stream");

// colors
$colors = array(
            array("bg" => array(0, 224, 224), "text" => array(192, 0, 0), "line" => array(255, 128, 128)),
            array("bg" => array(255, 192, 255), "text" => array(0, 192, 0), "line" => array(128, 255, 128)),
            array("bg" => array(224, 224, 192), "text" => array(0, 0, 192), "line" => array(128, 128, 255))
        );

$index = mt_rand(0,(count($colors)-1));
$bg_color   = imagecolorallocate($image, $colors[$index]["bg"][0],   $colors[$index]["bg"][1],   $colors[$index]["bg"][2]);
$text_color = imagecolorallocate($image, $colors[$index]["text"][0], $colors[$index]["text"][1], $colors[$index]["text"][2]);
$line_color = imagecolorallocate($image, $colors[$index]["line"][0], $colors[$index]["line"][1], $colors[$index]["line"][2]);

// background
imagefill($image, 0, 0, $bg_color);

$line_style = array($line_color, $line_color, $line_color, $line_color, $bg_color, $bg_color);
imagesetstyle($image, $line_style);

// put some fuzz info on the picture as well
imageline($image, 0, 7, 10, 0, IMG_COLOR_STYLED);
imageline($image, 0, 12, 20, 0, IMG_COLOR_STYLED);
imageline($image, 0, 17, 30, 0, IMG_COLOR_STYLED);
imageline($image, 0, 22, 40, 0, IMG_COLOR_STYLED);
imageline($image, 0, 27, 50, 0, IMG_COLOR_STYLED);
imageline($image, 0, 32, 60, 0, IMG_COLOR_STYLED);
imageline($image, 0, 37, 70, 0, IMG_COLOR_STYLED);

imageline($image, 0, 5, $WIDTH, 5, IMG_COLOR_STYLED);
imageline($image, 0, 10, $WIDTH, 10, IMG_COLOR_STYLED);
imageline($image, 0, 15, $WIDTH, 15, IMG_COLOR_STYLED);

// print number on image
imagestring($image, 5, 3, 2,  $number, $text_color);

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);

?>