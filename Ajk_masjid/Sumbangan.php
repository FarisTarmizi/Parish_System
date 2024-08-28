<?php
include 'layout/header.php';
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

$sumbangan = display("SELECT * FROM sumbangan ORDER BY idsumbangan DESC");
?>
<div class="content-wrapper" style="margin-left:0;margin-top:5%;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SENARAI SUMBANGAN</h1>
                    <div class="row">
                        <div class="col-10">
                            <a class="btn btn-primary mt-3" href="Tambah_sumbangan.php" role="button">
                                <i class="fas fa-plus-circle"></i>
                                TAMBAH REKOD SUMBANGAN
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content ">
        <div class="card col-12">
            <div class="card-header">
                <h2>PERINGATAN!!!</h2>
            </div>
            <div class="card-body">
                <b>TENTANG FUNGSI HALAMAN INI:</b>
                <p>Setiap kali setelah anda <b>melakukan penambahan rekod sumbangan</b> , anda perlu menyimpan rekod sumbangan
                    tersebut dengan <b>memuat turun file excel</b> .</p>
            </div>
        </div>

        <div class="container-fluid">
            <?php
            foreach ($sumbangan as $data) {
                $id = $data['idsumbangan'];
                $kariah = display("SELECT * FROM kariah WHERE `kodsumbangan`='$id'");
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-header">
                                <h2 class="card-title"><?= $data['nama']; ?></h2>
                                <a class="btn btn-primary float-right mt-2"
                                   href="Maklumat_sumbangan.php?id=<?= $data['idsumbangan'] ?>" role="button">
                                    BUTIRAN
                                    <i class="fas fa-info-circle"></i>
                                </a>
                                <form method="post" action="excel_sumbangan.php?id=<?=$id;?>">
                                    <input class="mt-2 float-right btn btn-success" type="submit" name="export_semua"
                                           role="button" value="Download Excel">
                                </form>
                                <br>
                                <h3 class="card-title mt-2">Tarikh: <?= date('d-m-Y', strtotime($data['masa'])); ?></h3>
                            </div>
                            <div class="card-body">
                                <!--                            <table id="example1" class="table table-bordered table-hover data-table">-->
                                <table class="table table-bordered table-hover data-table">
                                    <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>NAMA</th>
                                        <th>NO. TEL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    foreach ($kariah as $info):
                                        ?>
                                        <tr>
                                            <td><?= $num++; ?></td>
                                            <td><?= $info['nama'] ?></td>
                                            <td><?= $info['tel'] ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</div>
<?php
include 'layout/footer.php';
?>

