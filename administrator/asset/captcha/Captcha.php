<?php
session_start();
function random_string($len = 5, $str = '') {
    for ($i = 1; $i <= $len; $i++) {        //generates a random number that will be the ASCII code of the character.
        //We only want numbers (ascii code from 48 to 57) and caps letters. 	
        $ord = rand(50, 90);
        if ((($ord >= 48) && ($ord <= 57)) || (($ord >= 65) && ($ord <= 90)))
            $str.=chr($ord);  //If the number is not good we generate another one	
        else
            $str.=random_string(1);
    } 
    return $str;
}

//create the random string using the upper function 
//(if you want more than 5 characters just modify the parameter)
$rand_str = random_string(5);
// جدا کردن رشته به صورت 5 کاراکتر
$letter1 = substr($rand_str, 0, 1);
$letter2 = substr($rand_str, 1, 1);
$letter3 = substr($rand_str, 2, 1);
$letter4 = substr($rand_str, 3, 1);
$letter5 = substr($rand_str, 4, 1);
//Creates an image from a png file. If you want to use gif or jpg images, 
//just use the coresponding functions: imagecreatefromjpeg and imagecreatefromgif.
$image = imagecreatefrompng("pic.png");
//Get a random angle for each letter to be rotated with.
// تعیین زاویه نمایش کاراکترها
$angle1 = rand(rand(-30,30),rand(-30,30));
$angle2 = rand(rand(-30,30),rand(-30,30));
$angle3 = rand(rand(-30,30),rand(-30,30));
$angle4 = rand(rand(-30,30),rand(-30,30));
$angle5 = rand(rand(-30,30),rand(-30,30));
//Get a random font. (In this examples, the fonts are located in "fonts" directory and named from 1.ttf to 10.ttf)
// تعیین فونت برای نمایش هر یک از کاراکترها
$font1 = './font/' . rand(1, 2) . '.ttf';
$font2 = './font/' . rand(1, 2) . '.ttf';
$font3 = './font/' . rand(1, 2) . '.ttf';
$font4 = './font/' . rand(1, 2) . '.ttf';
$font5 = './font/' . rand(1, 2) . '.ttf';


//Define a table with colors (the values are the RGB components for each color).
//Get a random color for each letter.
// تعیین رنگ برای هر یک از کاراکتر ها
$color1 = rand(0, 254);
$color2 = rand(0, 254);
$color3 = rand(0, 254);
$color4 = rand(0, 254);
$color5 = rand(0, 254);

//Allocate colors for letters.
$textColor1 = imagecolorallocate($image, $color1, 10, $color3);
$textColor2 = imagecolorallocate($image, $color4, 13, $color2);
$textColor3 = imagecolorallocate($image, $color2, 20, $color1);
$textColor4 = imagecolorallocate($image, $color3, 10, $color5);
$textColor5 = imagecolorallocate($image, $color5, 20, $color4);

//Write text to the image using TrueType fonts.
// تعیین سایز برای هر یک از کاراکترها
$size1 = rand(17, 20);
$size2 = rand(17, 20);
$size3 = rand(17, 20);
$size4 = rand(17, 20);
$size5 = rand(17, 20);
// تعیین موقعیت نمایش برای هر کدام از کاراکترها
$y_pos1 = rand(28, 28);
$y_pos2 = rand(28, 28);
$y_pos3 = rand(28, 28);
$y_pos4 = rand(28, 28);
$y_pos5 = rand(28, 28);

imagettftext($image, $size1, $angle1, 10, $y_pos1, $textColor1, $font1, $letter1);
imagettftext($image, $size2, $angle2, 30, $y_pos2, $textColor2, $font2, $letter2);
imagettftext($image, $size3, $angle3, 55, $y_pos3, $textColor3, $font3, $letter3);
imagettftext($image, $size4, $angle4, 75, $y_pos4, $textColor4, $font4, $letter4);
imagettftext($image, $size5, $angle5, 92, $y_pos5, $textColor5, $font5, $letter5);


$_SESSION['captcha'] = $rand_str;

header("Content-type: image/png");
//Output image to browser
//imagejpeg($image);
imagepng($image);
//Destroys the 
imagedestroy($image);
?> 