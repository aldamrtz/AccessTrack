<?php
session_start();

// Set the dimensions of the CAPTCHA image
$width = 150;
$height = 50;
$image = imagecreatetruecolor($width, $height);

// Set colors
$bgColor = imagecolorallocate($image, 255, 255, 255); // White background
$textColor = imagecolorallocate($image, 0, 0, 0); // Black text

// Fill the background with the background color
imagefilledrectangle($image, 0, 0, $width, $height, $bgColor);

// Generate a random CAPTCHA text
$captchaText = substr(md5(rand()), 0, 5);
$_SESSION['captcha'] = $captchaText;

// Add the CAPTCHA text to the image
imagestring($image, 5, 30, 15, $captchaText, $textColor);

// Send the image to the browser
header('Content-type: image/png');
header('Cache-Control: no-cache, must-revalidate'); // Prevent caching
header('Expires: Sat, 26 Jul 1997 05:00:00 GMT'); // Date in the past

imagepng($image);
imagedestroy($image);
?>