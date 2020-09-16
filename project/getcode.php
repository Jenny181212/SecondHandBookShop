<?php  
$cimg = imagecreate(100, 20);    
imagecolorallocate($cimg, 14, 114, 180); // background color   
$red = imagecolorallocate($cimg, 255, 0, 0);  
$num1 = rand(1, 99);  //产生一个1到99的随机数1
$num2 = rand(1, 99);  //产生一个1到99的随机数2
session_start();  
$_SESSION['code'] = $num1 + $num2;  //将两个随机数相加存储在Session中
//输出两个随机数相加的图片
imagestring($cimg, 5, 5, 5, $num1, $red);  
imagestring($cimg, 5, 30, 5, "+", $red);  
imagestring($cimg, 5, 45, 5, $num2, $red);  
imagestring($cimg, 5, 70, 5, "=?", $red);   
header("Content-type: image/png");  
imagepng($cimg)  
?>  

