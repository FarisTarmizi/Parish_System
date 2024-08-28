<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Administration Masjid Ali-Imran
    </title>
    <link rel="icon" href="assets_template/dist/img/Ali.png" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets_template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
          href="assets_template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets_template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets_template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets_template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets_template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets_template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex-grow: 1;
        }

        .header {
            background-color: #113a5d;
            color: #fff;
            text-align: center;
            padding: 60px;
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .footer2 {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        input[type=checkbox] {
            padding: 10px;
        }

        label {
            font-weight: bolder;
        }

        hr {
            border-top: 3px solid black;
        }

        .input-container {
            position: relative;
        }

        .input-container input {
            padding-right: 30px;
        }

        .input-container i {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .semak {
            text-align: center;
        }

        @media print {
            .print-title::after {
                content: "MASJID ALI-IMRAN";
                font-size: 45px;
                color: #333;
            }

            .print-invisible {
                visibility: hidden;
            }
        }

        .scrollable-menu {
            max-height: 200px;
            overflow-y: auto;
        }

        .signature-container {
            border-top: 1px solid #ccc;
            margin-top: 20px;
            padding-top: 20px;
        }

        .signature {
            width: 150px;
            height: 50px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="assets_template/dist/img/Ali.png" alt="Masjid Ali-Imran" height="150"
         width="150">
</div>

<!--nav bar-->
<div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="index.php" style="font-size:35px">
                <img src="assets_template/dist/img/Ali.png" width="45px" height="45px" class="d-inline-block align-text-top">
                Masjid Ali-Imran &emsp;
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">
                            PERMOHONAN BARU
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Senarai_kariah.php">
                            SENARAI AHLI KARIAH
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Info_masjid.php">
                            BERKAITAN MASJID
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Sumbangan.php">
                            SUMBANGAN
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="aktiviti_masjid.php">
                            AKTIVITI MASJID
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link "
                           onclick="page(confirm('Adakah Anda Pasti Untuk Keluar?'));">
                            KELUAR
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                        </a>
                        <script>
                            function page(ans) {
                                return ans == 1 ? (window.location = '../index.php') : alert('There Is Something Wrong');
                            }
                        </script>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
