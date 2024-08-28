<?php //include 'config/app.php'; ?>
<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets_template/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets_template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets_template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets_template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets_template/dist/css/adminlte.min.css">

    <title>Masjid Ali-Imran</title>
    <link rel="icon" href="assets_template/dist/img/Ali.png" type="image/png">

    <style>
        .header {
            background-color: #36506c;
            color: #fff;
            text-align: center;
            padding: 3px;
        }

        .footer3 {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: relative;
            width: 100%;
        }
        .footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: absolute;
            width: 100%;
        }


        label {
            font-weight: bolder;
        }

        hr {
            border-top: 3px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        input {
            border: none;
            width: 100%;
        }

        .input {

            border-radius: 5px;
            border: 1px solid #ccc;
            display: block;
            box-sizing: border-box;
            outline: none;
            font-size: 15px;
            font-weight: normal;
            font-family: 'Open Sans', sans-serif;
            width: 343px;
        }

        .captcha-wrap {
            position: relative;
        }

        #CaptchaImageCode {
            text-align: center;
            margin-top: 15px;
            width: 300px;
            overflow: hidden;
        }

        .capcode {
            font-size: 20px;
            display: block;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
            letter-spacing: 1px;
            font-family: 'Roboto Slab', serif;
            font-weight: 100;
            font-style: italic;
        }

        .ReloadBtn {
            background: url('assets_template/captcha/img/refresh.png') left top no-repeat;
            background-size: 100%;
            width: 28px;
            height: 28px;
            border: 0px;
            outline: none;
            position: absolute;
            bottom: 30px;
            left: 310px;
            cursor: pointer;
        }

        .btnSubmit {
            margin-top: 15px;
            border: 0px;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            background-color: #1285c4;
            color: #fff;
            cursor: pointer;
        }

        .success {
            color: green;
            font-size: 18px;
            margin-bottom: 15px;
            display: none;
        }

        .error {
            color: red;
            display: none;
        }
    </style>
</head>

<!--nav bar-->
<nav class="navbar fixed-top navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php" style="font-size:35px">
            <img src="assets_template/dist/img/Ali.png" width="45px" height="45px" class="d-inline-block align-text-top">
            Masjid Ali-Imran &emsp;
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php" style="font-size:23px">Laman
                        Utama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Info_masjid.php" style="font-size:23px">Berkaitan masjid</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       style="font-size:23px" data-bs-toggle="dropdown" aria-expanded="false">
                        Kariah Masjid
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="Borang.php">Pendaftaran Kariah</a></li>
                        <li><a class="dropdown-item" href="Semak_kariah.php">Semakan Pendaftaran Kariah</a></li>
                        <li><a class="dropdown-item" href="Senarai_kariah.php">Senarai Kariah</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php" style="font-size:23px">Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


</body>
</html>