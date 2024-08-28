<?php
include 'layout/header2.php';
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

$ic = 0;
if (isset($_POST['semak'])) {
    if ($_POST['Kp'] > 0) {
        $ic = $_POST['Kp'];
        $query = display("SELECT * FROM kariah WHERE ic=$ic")[0];
        $id = $query['Idkariah'];
        $tquery = display("SELECT * FROM tanggungan WHERE kariah=$id");
        ?>
        <div class="container-fluid" style="margin-top:5%;">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="print-title text-center mb-3"></div>
                <div class="card-header">
                    <h1>
                        Status Pemohon
                    </h1>

                    <a class="btn btn-secondary print-invisible float-right"
                       href="print_individu.php?id=<?= $query['Idkariah'] ?>" target="_blank">
                        Print
                        <i class="fas fa-print"></i>
                    </a>
                </div>
                <div class="card-body">
                    <br>
                    <div class="row">
                        <div class="mb-3 col-4">
                            <label for="Nama" class="form-label">Nama Penuh</label>
                            <p><?= $query['nama'] ?></p>
                        </div>
                        <div class="mb-3 col-4">
                            <label for="tel" class="form-label">NO. TEL</label>
                            <p><?= $query['tel'] ?></p>
                        </div>
                    </div>

                    <div class="mb-5 col-6">
                        <label for="status" class="form-label">Status Kariah</label>
                        <p><?php if ($query['status'] == "") {
                                echo "Belum Disahkan";
                            }else{
                                echo $query['status'];
                            } ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "<script>
            alert('No. kad Pengenalan tidak sah!');
            document.location='Semak_kariah.php';
          </script>";
    }
} else {
    echo "<script>
            alert('Sesuatu Masalah Berlaku!');
            document.location='Semak_kariah.php';
          </script>";
}

include 'layout/footer3.php';
?>