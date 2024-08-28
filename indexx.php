<?php 
// Start session 
if(!session_id()){ 
    session_start(); 
} 
 
// If the form is submitted 
$status = 'danger'; 
if(isset($_POST['submit'])){ 
    // Check whether the captcha code input is empty 
    if(!empty($_POST['captcha_code'])){ 
        // Retrieve captcha code from session 
        $captchaCode = $_SESSION['captchaCode']; 
         
        // Get captcha code from user input 
        $user_captcha_code = $_POST['captcha_code']; 
         
        // Verify the captcha code 
        if($user_captcha_code === $captchaCode){ 
            $status = 'success'; 
            $statusMsg = 'Captcha code verified successfully!'; 
        }else{ 
            $statusMsg = 'Captcha code not matched, please try again.'; 
        } 
    }else{ 
        $statusMsg = 'Please enter the captcha code.'; 
    } 
} 
?>

<!-- Status message -->
<?php if(!empty($statusMsg)){ ?>
    <div class="alert alert-<?php echo $status; ?>"><?php echo $statusMsg; ?></div>
<?php } ?>

<!-- Captcha image -->
<img src="get_captcha.php" id="capImage"/>

<!-- Reload Captch image -->
<p>Can't read the image? click here to  <a href="javascript:void(0);" onclick="javascript:document.getElementById('capImage').src='get_captcha.php';">refresh</a>.</p>

<!-- Captcha code input form -->
<form method="post">
    <div class="input-group">
        <span class="input-group-text">Enter Captcha Code:</span>
        <input type="text" name="captcha_code" class="form-control">
    </div>
    <input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
</form>