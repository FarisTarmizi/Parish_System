<?php
include 'layout/header_print.php';

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

<div class="container-fluid mt-3" style="margin-top:5%;">
    <div class="card">
        <div class="print-title text-center mb-5"></div>
        <div class="card-header text-center">
            <h1>
                Butiran Pemohon
            </h1>
        </div>
        <div class="card-body mt-5">
            <br>
            <div class="row">
                <div class="mb-3 col-3">
                    <label for="Nama" class="form-label">Nama Penuh</label>
                    <p><?= $query['nama'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="Umur" class="form-label">Umur</label>
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
                    <label for="Bangsa" class="form-label">Bangsa</label>
                    <p><?= $query['bangsa'] ?></p>
                </div>
                <div class="mb-3 col-6">
                    <label for="Alamat" class="form-label">Alamat</label><br>
                    <p><?= $query['alamat'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="zon" class="form-label">Zon</label><br>
                    <p><?= $query['zon'] ?></p>
                </div>

            </div>

            <div class="row">
                <div class="mb-4 col-3">
                    <label for="fizikal" class="form-label">Keadaan Fizikal</label>
                    <p><?= $query['oku'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="cacat2" class="form-label">Jenis kecacatan</label>
                    <p><?= $query['joku'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="perkahwinan" class="form-label">Status perkahwinan</label>
                    <p><?= $query['kahwin'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="Pekerjaan" class="form-label">Pekerjaan</label>
                    <p><?= $query['pekerjaan'] ?></p>
                </div>

            </div>
            <div class="row">
                <div class="mb-3 col-3">
                    <label for="JPekerjaan" class="form-label">Jenis pekerjaan</label>
                    <p><?= $query['kpekerjaan'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="Gaji" class="form-label col-0">Pendapatan Seisi Rumah</label>
                    <p>RM <?= $query['gaji'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="NamaSIP" class="form-label">Nama Suami/Isteri/Penjaga</label>
                    <p><?= $query['namawaris'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="icSIP" class="form-label">NO. KP SUAMI/ISTERI/PENJAGA</label>
                    <p><?= $query['icwaris'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-3">
                    <label for="PekerjaanWaris" class="form-label">Kategori pekerjaan
                        Suami/Isteri/Penjaga</label>
                    <p><?= $query['pekerjaanwaris'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="KPekerjaan" class="form-label">Pekerjaan Suami/Isteri/Penjaga</label>
                    <p><?= $query['kpekerjaanwaris'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="bantuan" class="form-label">Jenis bantuan yang pernah diterima:</label>
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
                <label for="sendiri" class="form-label">Ahli Keluarga Dibawah Tanggungan</label>
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
                            <td><?= $data['oku'] ?></td>
                            <td><?= $data['kadoku'] ?></td>
                            <td><?= $data['yatim'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <?php
            } else {
                ?>
                <h6>Tiada Tanggungan</h6>
                <?php
            }
            ?>

            <div class="mb-5 col-4">
                <label for="status" class="form-label">Status Kariah</label>
                <p>
                    <b><?php if ($query['status'] == "") {
                            echo 'Belum Disahkan';
                        } else {
                            echo $query['status'];
                        } ?></b>
                </p>

            </div>

        </div>
    </div>
</div>
<script>
    window.onload = function () {
        window.print();
    };
</script>

