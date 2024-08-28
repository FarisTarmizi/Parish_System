<?php
// Get the date of birth as a sequence of numbers
$id = "031010021149";
$date_of_birth = substr($id,0,6);
 $sex= substr($id,11,1);
$gender = "Lelaki";

if ($sex%2==0){
$gender="Perempuan";
}
// Extract day, month, and year from the sequence
$year  = substr($date_of_birth, 0, 2);
$month = substr($date_of_birth, 2, 2);
$day= substr($date_of_birth, 4, 2);

// Get the current year
$current_year = date('y');

// Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
$year = ($year > $current_year) ? $year + 1900 : $year + 2000;

// Calculate the age
$age = date('Y') - $year;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Test Date&Time</title>
    <script>
        function updateTime() {
            let now = new Date();
            let hours = now.getHours().toString().padStart(2, '0');
            let minutes = now.getMinutes().toString().padStart(2, '0');
            let seconds = now.getSeconds().toString().padStart(2, '0');
            document.getElementById('clock').textContent = hours + ':' + minutes + ':' + seconds;
            setTimeout(updateTime, 1000);
        }
    </script>
    <style>
        *{
            text-align:center;
        }
    </style>
</head>
<body onload="updateTime()">
<h1>
    Current Date & Time: <br>
    <span>
    <?php try {
        $time = (new DateTime('today ', new DateTimeZone('Asia/Kuala_Lumpur')))->format('d-m-Y');
        echo $time;
    } catch (Exception $e) {
        echo 'Error';
    } ?>
    </span>
</h1>
<h1>Current Time:<br> <span id="clock"></span></h1>
<h1>Age:<?= $age;?></h1>
<h1>Jantina:<?php echo $gender."<br>"; echo date('d-m-Y');?></h1>
<?php phpinfo(); ?>
</body>
</html>