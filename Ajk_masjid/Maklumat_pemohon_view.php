<?php
include 'layout/header.php';

$id = (int)$_GET['id']; // ambik id dri url
function display($query)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $show = mysqli_query($db, $query);
    $row = [];

    while ($rows = mysqli_fetch_assoc($show)) {
        $row[] = $rows;
    }
    return $row;
}

function age($kp)
{
    $birth_year = substr($kp, 0, 2);
    $current_year = date('y');
    // Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
    $birth_year = ($birth_year > $current_year) ? (int)$birth_year + 1900 : (int)$birth_year + 2000;
    // Calculate the age
    return date('Y') - $birth_year;
}

$query = display("SELECT * FROM kariah WHERE Idkariah=$id")[0];
$tquery = display("SELECT * FROM tanggungan WHERE kariah=$id");
?>
    <div class="container-fluid " style="margin-top:5%;">
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="print-title text-center mb-3"></div>
            <div class="card-header">
                <h1>
                    BUTIRAN PEMOHON
                </h1>

                <a class="btn btn-secondary print-invisible float-right"
                   href="print_individu.php?id=<?= $query['Idkariah'] ?>" target="_blank">
                    CETAK
                    <i class="fas fa-print"></i>
                </a>
            </div>
            <div class="card-body">
                <form action="Status.php?id=<?= $query['Idkariah'] ?>" method="post">
                    <br>
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="Nama" class="form-label">NAMA PENUH</label>
                            <p><?= $query['nama'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="Umur" class="form-label">UMUR</label>
                            <p><?= age($query['ic']) ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="Kp" class="form-label">NO. KP</label>
                            <p><?= $query['ic'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="tel" class="form-label">NO. TEL</label>
                            <p><?= $query['tel'] ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-4 col-3">
                            <label for="Bangsa" class="form-label">BANGSA</label>
                            <p><?= $query['bangsa'] ?></p>
                        </div>
                        <div class="mb-3 col-6">
                            <label for="Alamat" class="form-label">ALAMAT</label><br>
                            <p><?= $query['alamat'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="zon" class="form-label">ZON</label><br>
                            <p><?= $query['zon'] ?></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="mb-4 col-3">
                            <label for="fizikal" class="form-label">KEADAAN FIZIKAL</label>
                            <p><?= $query['oku'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="cacat2" class="form-label">JENIS KECACATAN</label>
                            <p><?= $query['joku'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="perkahwinan" class="form-label">STATUS PERKAHWINAN</label>
                            <p><?= $query['kahwin'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="Pekerjaan" class="form-label">PEKERJAAN</label>
                            <p><?= $query['pekerjaan'] ?></p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="JPekerjaan" class="form-label">JENIS PEKERJAAN</label>
                            <p><?= $query['kpekerjaan'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="Gaji" class="form-label col-0">PENDAPATAN SEISI RUMAH</label>
                            <p>RM <?= $query['gaji'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="NamaSIP" class="form-label">NAMA SUAMI/ISTERI/PENJAGA</label>
                            <p><?= $query['namawaris'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="icSIP" class="form-label">NO. KP SUAMI/ISTERI/PENJAGA</label>
                            <p><?= $query['icwaris'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-3">
                            <label for="PekerjaanWaris" class="form-label">KATEGORI PEKERJAAN
                                SUAMI/ISTERI/PENJAGA</label>
                            <p><?= $query['pekerjaanwaris'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="KPekerjaan" class="form-label">Pekerjaan Suami/Isteri/Penjaga</label>
                            <p><?= $query['kpekerjaanwaris'] ?></p>
                        </div>
                        <div class="mb-3 col-3">
                            <label for="bantuan" class="form-label">JENIS BANTUAN YANG PERNAH DITERIMA:</label>
                            <p><?= $query['bantuan'] ?></p>
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
                    <label class="form-label">Tanggungan:</label>
                    <?php
                    if (!empty($tquery)) {
                        ?>
                        <label for="sendiri" class="form-label">AHLI KELUARGA DIBAWAH TANGGUNGAN</label>
                        <table id="userTable">
                            <tr>
                                <th>Bil.</th>
                                <th>Nama</th>
                                <th>Hubungan</th>
                                <th>Ic</th>
                                <th>Umur</th>
                                <th>Darjah/Tingkatan/Pekerjaan</th>
                                <th>OKU</th>
                                <th>Kad OKU</th>
                                <th>Anak Yatim/Piatu</th>
                            </tr>
                            <?php
                            $num = 1;
                            foreach ($tquery as $data):
                                ?>
                                <tr>
                                    <td><?= $num++; ?></td>
                                    <td><?= strtoupper($data['nama']) ?></td>
                                    <td><?= $data['hubungan'] ?></td>
                                    <td><?= $data['ic'] ?></td>
                                    <td><?= age($data['ic']) ?></td>
                                    <td><?= $data['pekerjaan'] ?></td>
                                    <td><?php
                                        if ($data['oku'] == "")
                                            echo "No";
                                        else
                                            echo $data['oku']; ?>
                                    </td>
                                    <td><?php
                                        if ($data['kadoku'] == "")
                                            echo "No";
                                        else
                                            echo $data['kadoku']; ?>
                                    </td>
                                    <td><?php
                                        if ($data['yatim'] == "")
                                            echo "No";
                                        else
                                            echo $data['yatim']; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php
                    } else {
                        ?>
                        <h6>TIADA TANGGUNGAN</h6>
                        <?php
                    }
                    ?>
                    <div class="mb-5 col-4">
                        <label for="status" class="form-label">STATUS KARIAH</label>
                        <p><?php if ($query['status'] == "") {
                                echo "Belum Disahkan";
                            } ?></p>
                    </div>

                    <button class="btn btn-success float-right" type="submit" name="terima">
                        Terima
                        <i class="fas fa-user-check"></i>
                    </button>
                    <button class="btn btn-danger float-right" type="submit" name="tolak"
                            onclick="return confirm('Anda pasti menolak?')">
                        Tolak
                        <i class="fas fa-user-times"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php
include 'layout/footer.php'; ?>