<?php
include 'layout/header.php';

$nama = '';
$data = '';
// Check if the form is submitted
if (isset($_POST['tmbh_bntuan'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $nama = strtoupper($_POST['bantuan']);
    $data = "INSERT INTO `jenis_bantuan`(`idbantuan`, `nama`) VALUES (null,'$nama')";
    mysqli_query($db, $data);
    ?>
    <script>
        alert('Anda telah berjaya menambah jenis bantuan');
    </script>
    <?php
    mysqli_affected_rows($db);
} elseif (isset($_POST['ubah_bntuan'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $id = $_POST['id'];
    $nama = strtoupper($_POST['bantuan']);
    $data = "UPDATE `jenis_bantuan` SET `nama`='$nama' WHERE `idbantuan`= '$id'";
    mysqli_query($db, $data);
    ?>
    <script>
        alert('Anda telah berjaya ubah');
    </script>
    <?php
    mysqli_affected_rows($db);
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

$data_sumbangan = display("SELECT * FROM jenis_bantuan");
?>
<div class="content-wrapper" style="margin-left:0;margin-top:5%;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">SENARAI BANTUAN</h1>
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
                            <h3 class="card-title">Senarai Jenis Bantuan</h3>
                            <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                                    data-bs-target="#staticBackdrop">
                                Tambah Jenis Bantuan
                                <i class="fas fa-plus-circle"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                 data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                 aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Tambah Jenis Bantuan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <form method="post"
                                              action="#">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="bantuan" class="form-label">Nama Bantuan:</label>
                                                    <input type="text" class="form-control" id="bantuan" name="bantuan"
                                                           required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    BATAL
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="tmbh_bntuan">
                                                    TAMBAH
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!--                            <table id="example1" class="table table-bordered table-hover">-->
                            <table class="table table-bordered table-hover data-table">
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>TINDAKAN</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                foreach ($data_sumbangan as $data) {
                                    ?>
                                    <tr>
                                        <td><?= $num++; ?></td>
                                        <td><?= strtoupper($data['nama']) ?></td>
                                        <td>
                                            <div class="row">
                                                <button type="button" class="btn btn-success col-3" data-bs-toggle="modal"
                                                        data-bs-target="#staticBackdrop2">
                                                    UBAH
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static"
                                                     data-bs-keyboard="false" tabindex="-1"
                                                     aria-labelledby="staticBackdropLabel"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Ubah
                                                                    Jenis Bantuan</h5>
                                                                <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                            </div>
                                                            <form method="post"
                                                                  action="#">
                                                                <div class="modal-body">
                                                                    <div class="mb-3">
                                                                        <input type="hidden"
                                                                               value="<?= $data['idbantuan']; ?>"
                                                                               name="id">
                                                                        <label for="bantuan" class="form-label">Nama
                                                                            Bantuan:</label>
                                                                        <input type="text" class="form-control"
                                                                               id="bantuan" name="bantuan"
                                                                               value="<?= strtoupper($data['nama']); ?>"
                                                                               required>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                        BATAL
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary"
                                                                            name="ubah_bntuan">UBAH
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <form action="Status.php?id=<?= $data['idbantuan'] ?>" method="post" class="col-4">
                                                    <button class="btn btn-danger " type="submit" name="buang_sumbangan"
                                                            onclick="return confirm('Anda pasti?')">
                                                        BUANG
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
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
