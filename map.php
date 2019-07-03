<?php
// FETCH IMAGE & WRITE TEXT
$img = imagecreatefromjpeg('http://localhost/VirtualRun/image/msuvirtualrun-bib.jpg');
$white = imagecolorallocate($img, 0, 0, 0);
$back = imagecolorallocate($img, 255, 255, 255);
$txt = $_POST['bib'];
$text= $_POST['name'];
$textk = $_POST['kiro'];
$textki = "K";
$font = "font\CALISTB.ttf"; 

// THE IMAGE SIZE
$width = imagesx($img);
$height = imagesy($img);

// THE TEXT SIZEตัวเลข
$text_size = imagettfbbox(185, 0, $font, $txt);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

// CENTERING THE TEXT BLOCK ตัวเลข
$centerX = CEIL(($width - $text_width));
$centerX = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - $text_height));
$centerY = $centerY<0 ? 0 : $centerY;
imagettftext($img, 185, 0, 398, 400, $white, $font, $txt);

// text ชื่อ
$text_size = imagettfbbox(30, 0 , $font , $text);
$text_width =$text_size[0] + (1300/2) - ($text_size[4]/2);
$text_height =$text_size[1] + (1300/2) - ($text_size[5]/2);
imagettftext($img, 30, 0, $text_width, 550, $white, $font, $text);

// $text_size = imagettfbbox(30, 0, $font, $text=$_POST['name']);
// $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
// $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);
// $centerX = CEIL(($width - $text_width) / 1.5);
// $centerX = $centerX<0 ? 0 : $centerX;
// $centerY = CEIL(($height - $text_height+150) / 1.5);
// $centerY = $centerY<0 ? 0 : $centerY;


// กิโล
$text_size = imagettfbbox(80, 0, $font, $txt);
$text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
$text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

// CENTERING THE TEXT BLOCK ตัวเลขกิโล
$centerX = CEIL(($width - $text_width) / 2);
$centerX = $centerX<0 ? 0 : $centerX;
$centerY = CEIL(($height - $text_height+120) / 2);
$centerY = $centerY<0 ? 0 : $centerY;
imagettftext($img, 40, 0, 100, 290, $back, $font, $textk);

// OUTPUT IMAGE
header('Content-type: image/jpeg');
imagejpeg($img);
imagedestroy($jpg_image);
?>