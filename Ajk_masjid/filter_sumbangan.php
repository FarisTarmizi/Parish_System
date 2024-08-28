<?php
include 'layout/header_nopreload.php';

function kod()
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $query = "SELECT idsumbangan FROM sumbangan ORDER BY idsumbangan DESC LIMIT 1";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['idsumbangan'];
}


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

if (isset($_POST['daftar'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $name = strtoupper($_POST['name']);
    $tmpt = strtoupper($_POST['tmpt']);
    $bil = $_POST['bil'];
    $dana = strtoupper($_POST['dana']);
    $lain = !empty($_POST['lain']) ? strtoupper($_POST['lain']) : "tiada";
    $masa = $_POST['masa'];
    $ajk = strtoupper($_POST['ajk']);

    $pilih = $_POST['pilih'];

    $insert = "INSERT INTO `sumbangan`(`nama`, `tempat`, `bil_penerima`, `dana`, `lain`, `masa`, `nama_pic`)
                VALUES ('$name','$tmpt','$bil','$dana','$lain','$masa','$ajk')";


    if (sizeof($pilih) > 0) {
        mysqli_query($db, $insert);
        $lastInsertedId = mysqli_insert_id($db); // Get the last inserted ID
        for ($i = 0; $i < count($pilih); $i++) {
            $query2 = "UPDATE `kariah` SET `kodsumbangan`='$lastInsertedId' WHERE `Idkariah`='$pilih[$i]'";
            mysqli_query($db, $query2);
        }
        echo "<script>
        alert('Berjaya daftar sumbangan');
        document.location = 'Sumbangan.php';
         </script>";
        return mysqli_affected_rows($db);
    } else {
        echo "<script>
            alert('Sila pilih peserta');
            document.location = 'Tambah_sumbangan.php';
        </script>";
    }
} else {
    if (isset($_POST['tapis'])) {
        $condition = $_POST['filter'];
        $query2 = "";
        if ($_POST['filter'] != "BELUM MENERIMA BANTUAN BULANAN") {
            if ($_POST['filter'] == "ASNAF") {
                $query2 = "SELECT * FROM kariah WHERE gaji = '<2500' AND status = 'Disahkan'";
            } elseif ($_POST['filter'] == "PENDAPATAN RENDAH") {
                $query2 = "SELECT * FROM kariah WHERE gaji = '2501-3170' AND status = 'Disahkan'";
            } else {
                $query2 = "SELECT * FROM kariah WHERE  status = 'Disahkan'";
            }

        } else {
            $kod = kod();
            $query2 = "SELECT kariah.*, sumbangan.nama FROM kariah LEFT JOIN sumbangan ON kariah.kodsumbangan = sumbangan.idsumbangan
            WHERE kariah.status = 'Disahkan' AND (kariah.kodsumbangan < $kod OR kariah.kodsumbangan IS NULL)
            AND (sumbangan.nama LIKE '%bulanan%' OR sumbangan.nama LIKE '%Bulanan%')";
        }

        $data_kariah = display($query2);
        ?>
        <div class="container mt-5" style="margin-top:5%;">
            <h1>Daftar Sumbangan</h1>
            <hr>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">NAMA SUMBANGAN</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="row">
                    <div class="mb-3 col-8">
                        <label for="tmpt" class="form-label">TEMPAT</label>
                        <input type="text" class="form-control" id="tmpt" name="tmpt">
                    </div>

                    <div class="mb-3 col-4">
                        <label for="bil" class="form-label">BIL. PENERIMA</label>
                        <input type="number" class="form-control" id="bil" name="bil">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-8">
                        <label for="dana" class="form-label">Dana:</label>
                        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="dana">
                            <option value="MAIPS">MAIPS</option>
                            <option value="JKM">JKM</option>
                            <option value="MASJID ALI-IMRAN">MASJID ALI-IMRAN</option>
                            <option value="LAIN-LAIN">LAIN-LAIN</option>
                        </select>
                    </div>

                    <div class="mb-3 col-4">
                        <label for="masa" class="form-label">Masa:</label>
                        <input type="date" class="form-control" id="masa" name="masa">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="lain" class="form-label">Nyatakan Jika Lain-Lain Atau Dana Tambahan:</label>
                    <input type="text" class="form-control" id="lain" name="lain">
                </div>

                <div class="mb-4 col-13">
                    <label for="filter" class="form-label">
                        TAPISAN PENERIMA:
                    </label><br>
                    <select class="form-select" aria-label="Default select example" name="filter">
                        <option>TAPISAN KARIAH</option>
                        <option value="SEMUA" <?php if ($condition == 'SEMUA') echo "selected"; ?>>SEMUA</option>
                        <option value="ASNAF" <?php if ($condition == 'ASNAF') echo "selected"; ?>>ASNAF</option>
                        <option value="PENDAPATAN RENDAH" <?php if ($condition == 'PENDAPATAN RENDAH') echo "selected"; ?>>
                            PENDAPATAN RENDAH
                        </option>
                        <option value="BELUM MENERIMA BANTUAN" <?php if ($condition == 'BELUM MENERIMA BANTUAN BULANAN') echo "selected"; ?>>
                            BELUM MENERIMA BANTUAN BULANAN
                        </option>
                    </select>
                    <input type="submit" name="tapis" class="btn btn-primary btn-sm mt-3" value="Tapis">


                    <table class="table table-bordered table-hover data-table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>No. KP</th>
                            <th>No. Tel</th>
                            <th>Pilihan</th> <!-- New column for reaction -->
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="4" class="text-center" style="font-weight: bold">Senarai Tapisan Kariah</td>
                            <td>
                                <input type="checkbox" id="select-all">
                                Pilih Semua
                            </td>
                        </tr>
                        <?php
                        $num = 1;
                        $id = 0;
                        if ($data_kariah > 0) {
                            foreach ($data_kariah as $data) {
                                ?>
                                <tr>
                                    <td><?= $num++; ?></td>
                                    <td><?= strtoupper($data['nama']) ?></td>
                                    <td><?= $data['ic'] ?></td>
                                    <td><?= $data['tel'] ?></td>
                                    <td>
                                        <input type="checkbox" class="reaction-checkbox" name="pilih[<?= $id ?>]"
                                               value="<?= $data['Idkariah'] ?>">
                                    </td>
                                </tr>
                                <?php
                                $id++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5" class="text-center" style="font-weight: bold">Tiada Rekod Kariah</td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <input type="hidden" name="total" value="<?= $id ?>">
                    <script>
                        document.getElementById('select-all').addEventListener('change', function () {
                            var checkboxes = document.querySelectorAll('.reaction-checkbox');
                            checkboxes.forEach(function (checkbox) {
                                checkbox.checked = document.getElementById('select-all').checked;
                            });
                        });

                        var checkboxes = document.querySelectorAll('.reaction-checkbox');
                        checkboxes.forEach(function (checkbox) {
                            checkbox.addEventListener('change', function () {
                                document.getElementById('select-all').checked = Array.from(checkboxes).every(function (checkbox) {
                                    return checkbox.checked;
                                });
                            });
                        });
                    </script>
                    <div class="mt-3 mb-4 col-3">
                        <label for="ajk" class="form-label">DISEDIAKAN OLEH:</label>
                        <input type="text" class="form-control" id="ajk" name="ajk">
                    </div>
                    <input type="submit" name="daftar" class="mt-5 mb-3 btn btn-primary " style="float: right;"
                           value="Daftar">
                </div>
            </form>
        </div>
        <?php
    }
}
include "layout/footer.php";