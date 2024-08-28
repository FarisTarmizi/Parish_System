<?php
session_start();
include 'layout/header.php';

$nama = strtoupper($_POST['nama']);
$tel = $_POST['tel'];
$ic = $_POST['ic'];
$umur = $_POST['umur'];
$alamat = $_POST['alamat'];
$zon = $_POST['zon'];
$bangsa = $_POST['bangsa'];
$oku = $_POST['oku'];
$joku = !empty($_POST['joku']) ? $_POST['joku'] : "tiada";
$kadoku = $_POST['kadoku'];
$status = $_POST['status'];
$menghuni = $_POST['menghuni'];
$pekerjaan = $_POST['pekerjaan'];
$kpekerjaan = $_POST['kpekerjaan'];
$gaji = $_POST['gaji'];
$namawaris = !empty($_POST['namawaris']) ? strtoupper($_POST['namawaris']) : "tiada";
$icwaris = !empty($_POST['icwaris']) ? $_POST['icwaris'] : "tiada";
$pekerjaanwaris = !empty($_POST['pekerjaanwaris']) ? $_POST['pekerjaanwaris'] : "tiada";
$kpekerjaanwaris = !empty($_POST['kpekerjaanwaris']) ? $_POST['kpekerjaanwaris'] : "tiada";
$bantuan = $_POST['bantuan'];
if ($bantuan == "LAIN-LAIN") {
    $bantuan_lain = $_POST['lain'];
} else {
    $bantuan_lain = "tiada";
}

$_SESSION['nama'] = $nama;
$_SESSION['ic'] = $ic;
$_SESSION['tel'] = $tel;
$_SESSION['alamat'] = $alamat;
$_SESSION['zon'] = $zon;
$_SESSION['bangsa'] = $bangsa;
$_SESSION['oku'] = $oku;
$_SESSION['kadoku'] = $kadoku;
$_SESSION['joku'] = $joku;
$_SESSION['status'] = $status;
$_SESSION['menghuni'] = $menghuni;
$_SESSION['pekerjaan'] = $pekerjaan;
$_SESSION['kpekerjaan'] = $kpekerjaan;
$_SESSION['gaji'] = $gaji;
$_SESSION['namawaris'] = $namawaris;
$_SESSION['icwaris'] = $icwaris;
$_SESSION['pekerjaanwaris'] = $pekerjaanwaris;
$_SESSION['kpekerjaanwaris'] = $kpekerjaanwaris;
$_SESSION['bantuan'] = $bantuan;
$_SESSION['$bantuan_lain'] = $bantuan_lain;
if (!empty($nama && $tel && $ic && $alamat && $zon && $bangsa && $oku && $kadoku && $status && $menghuni && $pekerjaan & $kpekerjaan
    && $gaji && $bantuan)) {
    ?>
    <div class="container-fluid" style="margin-top:5%;">
        <div class="card">
            <div class="print-title text-center mb-3"></div>
            <div class="card-header">
                <h1>
                    Butiran Pemohon

                </h1>
            </div>
            <div class="card-body">
                <form action="confirmprocess.php" method="post">
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="nama" class="form-label">Nama Penuh</label>
                            <p><?php echo $nama; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="umur" class="form-label">Umur</label>
                            <p><?php echo $umur; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="ic" class="form-label">NO. KP</label>
                            <p><?php echo $ic; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="tel" class="form-label">NO. TEL</label>
                            <p><?php echo $tel; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-4 col-3">
                            <label for="bangsa" class="form-label">Bangsa</label>
                            <p><?php echo $bangsa; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="alamat" class="form-label">Alamat</label><br>
                            <p><?php echo $alamat; ?></p>
                        </div>
                        <div class="mb-4 col-3">
                            <label for="oku" class="form-label">Keadaan Fizikal</label>
                            <p><?php echo $oku; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="joku" class="form-label">Jenis kecacatan</label>
                            <p><?php echo $joku; ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="perkahwinan" class="form-label">Status perkahwinan</label>
                            <p><?php echo $status; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="kpekerjaan" class="form-label">Pekerjaan</label>
                            <p><?php echo $kpekerjaan; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="pekerjaan" class="form-label">Jenis pekerjaan</label>
                            <p><?php echo $pekerjaan; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="gaji" class="form-label col-0">PENDAPATAN SEISI RUMAH</label>
                            <p>RM <?php echo $gaji; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="namawaris" class="form-label">Nama Suami/Isteri/Penjaga</label>
                            <p><?php echo $namawaris; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="icwaris" class="form-label">No. KP Suami/Isteri/Penjaga</label>
                            <p><?php echo $icwaris; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="kpekerjaanwaris" class="form-label">Kategori pekerjaan
                                Suami/Isteri/Penjaga</label>
                            <p><?php echo $kpekerjaanwaris; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="pekerjaanwaris" class="form-label">Pekerjaan Suami/Isteri/Penjaga</label>
                            <p><?php echo $pekerjaanwaris; ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="bantuan" class="form-label">Jenis bantuan yang pernah diterima:</label>
                            <p><?php
                                if ($bantuan == "LAIN-LAIN") {
                                    echo $bantuan_lain;
                                } else {
                                    echo $bantuan;
                                }
                                ?></p>
                        </div>
                    </div>
                    <style>
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
                    </style>


                    <label for="sendiri" class="form-label">Tanggungan</label>
                    <?php

                    $row = isset($_POST['rowCount']) ? (int)$_POST['rowCount'] : 0;
                    $total = $row - 1;
                    $namat = $hubungant = $ict = $umurt = $sekolaht = $okut = $kadt = $anakt = array(); // Initialize arrays to store values
                    for ($d = 0; $d < $total; $d++) {
                        $namat[$d] = $_POST['namat' . $d];
                        $hubungant[$d] = $_POST['hubungant' . $d];
                        $ict[$d] = $_POST['ict' . $d];
                        $umurt[$d] = $_POST['umurt' . $d];
                        $sekolaht[$d] = $_POST['sekolaht' . $d];
                        $okut[$d] = isset($_POST['okut' . $d]) ? $_POST['okut' . $d] : 'No';
                        $kadt[$d] = isset($_POST['kadt' . $d]) ? $_POST['kadt' . $d] : 'No';
                        $anakt[$d] = isset($_POST['anakt' . $d]) ? $_POST['anakt' . $d] : 'No';
                    }
                    if (!empty($namat)) {
                        ?>
                        <table id="userTable">
                            <tr>
                                <th>Bil.</th>
                                <th>Nama</th>
                                <th>Hubungan</th>
                                <th>NO. KP</th>
                                <th>Umur</th>
                                <th>Nama Sekolah/Pekerjaan</th>
                                <th>OKU</th>
                                <th>Kad OKU</th>
                                <th>Anak Yatim/Piatu</th>
                            </tr>
                            <?php
                            $bc = 1;
                            for ($j = 0; $j < $total; $j++) {
                                ?>
                                <tr>
                                    <td><?php echo $bc++; ?></td>
                                    <td><?php echo $namat[$j]; ?></td>
                                    <td><?php echo $hubungant[$j]; ?></td>
                                    <td><?php echo $ict[$j]; ?></td>
                                    <td><?php echo $umurt[$j]; ?></td>
                                    <td><?php echo $sekolaht[$j]; ?></td>
                                    <td><?php echo $okut[$j]; ?></td>
                                    <td><?php echo $kadt[$j]; ?></td>
                                    <td><?php echo $anakt[$j]; ?></td>
                                </tr>
                                <?php
                            } ?>
                        </table>
                        <?php
                    } else {
                        ?>
                        <h6>Tiada Tanggungan</h6>
                        <?php
                    }


                    $_SESSION['namat'] = $namat;
                    $_SESSION['hubungant'] = $hubungant;
                    $_SESSION['ict'] = $ict;
                    $_SESSION['umurt'] = $umurt;
                    $_SESSION['sekolaht'] = $sekolaht;
                    $_SESSION['okut'] = $okut;
                    $_SESSION['kadt'] = $kadt;
                    $_SESSION['anakt'] = $anakt;
                    $_SESSION['total'] = $total;
                    ?>
                    <div class="row offset-md-9">
                        <div class="col-1"><input type="checkbox" value="" id="invalidCheck" required></div>
                        <div class="col-10"><label for="invalidCheck">
                                Maklumat diberikan adalah benar
                            </label>
                        </div>
                    </div>
                    <input type="submit" name="submit" class="mt-4 btn btn-primary"
                           style="float: right; width:80px;" value="Daftar">
                </form>

                <a href="Editborang.php" name="back" class="mt-4 btn btn-success btn-lg">Back</a>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <script>
        alert('Borang Tidak Lengkap!');
        document.location = 'Editborang.php';
    </script>
    <?php
}

include 'layout/footer.php'; ?>