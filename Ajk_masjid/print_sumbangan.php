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

$sumbangan = display("SELECT * FROM sumbangan WHERE idsumbangan = $id")[0];
$kariah = display("SELECT * FROM kariah WHERE `kodsumbangan`='$id'");

?>

<section class="content" style="margin-top:5%;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="print-title text-center mb-3"></div>
                    <div class="card-header" style="text-align: center">
                        <h2 class="mt-2">
                            BUTIRAN <?= $sumbangan['nama']; ?>
                        </h2>
                        <hr>
                        <br>
                        <h4 class="mt-2">TARIKH: <?= date('d-m-Y', strtotime($sumbangan['masa'])); ?></h4>
                        <h4 class="mt-2">TEMPAT: <?= $sumbangan['tempat']; ?></h4>
                        <h4 class="mt-2">BIL. PENERIMA: <?= $sumbangan['bil_penerima']; ?> ORANG</h4>
                        <h4 class="mt-2">DANA: <?= $sumbangan['dana']; ?></h4>
                        <h4 class="mt-2">DANA TAMBAHAN: <?= $sumbangan['lain']; ?></h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. KP</th>
                                <th>No. Tel</th>
                                <th>Alamat</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 1;
                            foreach ($kariah as $data) {
                                ?>
                                <tr>
                                    <td><?= $num++; ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['ic'] ?></td>
                                    <td><?= $data['tel'] ?></td>
                                    <td><?= $data['alamat']?> ,02600 Perlis</td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 mt-5">
            <h3>DISEDIAKAN OLEH:</h3>
            <div class="signature"></div>
            <p><?= $sumbangan['nama_pic']; ?></p>
            <p>JAWATAN:</p>
            <p>TARIKH:</p>
        </div>
    </div>
</section>

<script>
    window.onload  = function (){
        window.print();
    };
</script>
