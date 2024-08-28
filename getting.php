<?php 
    $captcha = $_POST['captcha'];
    $check = false;

    if (isset($_SESSION['captcha'])) {
        // Case sensitive Matching
        if ($captcha == $_SESSION['captcha']) {
            $check = true;
        }
        unset($_SESSION['captcha']);
    }

 if ($check){
    echo"<div><h3>You are a Human</h3></div>";
 }
else {
    echo "<div><h3>You are a Bot</h3></div>";
}
                            
                     