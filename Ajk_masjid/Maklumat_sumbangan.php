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

$sumbangan = display("SELECT * FROM sumbangan WHERE idsumbangan = $id")[0];
$kariah = display("SELECT * FROM kariah WHERE `kodsumbangan`='$id'");


?>
<div class="content-wrapper" style="margin-left:0;margin-top:5%;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">BUTIRAN <?= $sumbangan['nama']; ?></h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-header">
                            <h6 class="card-title mt-2">
                                TARIKH: <?= date('d-m-Y', strtotime($sumbangan['masa'])); ?></h6>
                            <form action="print_sumbangan.php?id=<?= $sumbangan['idsumbangan'] ?>" method="post"
                                  target="_blank">
                                <button type="submit" class="btn btn-secondary print-invisible float-right mt-2">
                                    CETAK
                                    <i class="fas fa-print"></i>
                                </button>
                            </form>
                            <br>
                            <h6 class="mt-2">TEMPAT: <?= $sumbangan['tempat']; ?></h6>
                            <h6 class="mt-2">BIL. PENERIMA: <?= $sumbangan['bil_penerima']; ?> ORANG</h6>
                            <h6 class="mt-2">DANA: <?= $sumbangan['dana']; ?></h6>
                            <h6 class="mt-2">DANA TAMBAHAN: <?= $sumbangan['lain']; ?></h6>
                            <h6 class="mt-2">DISEDIAKAN OLEH: <?= $sumbangan['nama_pic']; ?></h6>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA</th>
                                    <th>NO. TEL</th>
                                    <th>BUTIRAN</th>
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
                                        <td><?= $data['tel'] ?></td>
                                        <td>
                                            <a class="btn btn-success" href="Maklumat_pemohon.php?id=<?= $data['Idkariah']?>"
                                               role="button" >
                                                <i class="fas fa-address-card"></i>
                                                BUTIRAN
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php
include 'layout/footer.php';
?>

