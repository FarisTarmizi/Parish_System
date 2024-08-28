<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO kariah (name, email) VALUES ('$name', '$email')";

    if (mysqli_query($connection, $sql)) {
        echo "Record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>
