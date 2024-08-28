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

$data_kariah = display("SELECT * FROM kariah WHERE status = '' ORDER BY Idkariah DESC");
?>
<div class="content-wrapper" style="margin-left:0; margin-top:5%;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">PERMOHONAN KARIAH BARU</h1>
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
                            <h3 class="card-title">Senarai Pemohon</h3>
                            <a class="btn btn-primary float-right" href="Borang.php" role="button">
                                Tambah
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                        <div class="card-body">
                            <!--                            <table id="example1" class="table table-bordered table-hover">-->
                            <table class="table table-bordered table-hover data-table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>No. Tel</th>
                                    <th>Butiran</th>
                                    <th>Tindakan</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                foreach ($data_kariah as $data):
                                    ?>
                                    <tr>
                                        <td><?= $num++; ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['tel'] ?></td>
                                        <td>
                                            <a class="btn btn-success"
                                               href="Maklumat_pemohon_view.php?id=<?= $data['Idkariah'] ?>"
                                               role="button">
                                                <i class="fas fa-address-card"></i>
                                                Butiran
                                            </a>
                                        </td>
                                        <td>
                                            <form action="Status.php?id=<?= $data['Idkariah'] ?>" method="post">
                                                <button class="btn btn-success" type="submit" name="terima">
                                                    Terima
                                                    <i class="fas fa-user-check"></i>
                                                </button>
                                                <button class="btn btn-danger" type="submit" name="tolak"
                                                        onclick="return confirm('Anda pasti?')">
                                                    Tolak
                                                    <i class="fas fa-user-times"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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




