<?php 
 
// Include Captcha library 
require_once 'Captcha.class.php'; 
 
// Initialize Captcha class with configuration options 
$configOptions = array( 
    'img_width' => '500', 
    'img_height' => '200', 
    'font_size' => '100', 
    'font_path' => 'fonts/monofont.ttf', 
); 
$captcha = new Captcha($configOptions); 
 
// Load captcha image 
$captcha->createCaptcha(); 
 
?>