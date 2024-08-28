<?php include 'layout/header2.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="assets_template/dist/img/Ali.png" type="image/png">
    <style>
        body {
            background-image: url('layout/madina.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: rgba(255, 255, 255, 0.5);
        }

        form {
            background-color: #11111139;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            max-width: 350px; /* Set a maximum width for better responsiveness */
            width: 90%; /* Adjusted width for better responsiveness */
            text-align: center;
        }

        .h1 {
            font-size: 24px;
            font-weight: bold;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; /* Full width for better responsiveness */
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<section>
    <form action="loginprocess.php" method="post" class="form">
        <label class="h1">LOGIN</label><br><br>
        <label for="nama">Nama pengguna :</label>
        <input type="text" id="nama" name="nama" <?php
        if(isset($_COOKIE['uname'])){
            echo 'value="'.$_COOKIE['uname'].'"';
        }else{
            echo "";
        }
        ?> required>
        <br><br>
        <label for="pass">Kata Laluan :</label>
        <input type="password" id="pass" name="pass" <?php
        if(isset($_COOKIE['pass'])){
            echo 'value="'.$_COOKIE['pass'].'"';
        }else{
            echo "";
        }
        ?> required>
        
        <div class="form-check mt-3">
            <input class="form-check-input" type="checkbox" id="remember" name="remember" <?php
            if(isset($_COOKIE['pass']) && isset($_COOKIE['uname']) ){
                echo "checked";
            }else{
                echo "";
            }
            ?> >
            <label class="form-check-label" for="remember">Simpan Kata Laluan</label>
        </div>

        <br><br><br>
        <input type="submit" name="login" value="Masuk">
    </form>
</section>

<?php include 'layout/footer2.php'; ?>
</body>
</html>
