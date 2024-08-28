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

function delete($id,$name)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $query = "DELETE FROM `aktiviti` WHERE idaktiviti = $id";
    mysqli_query($db, $query);
    unlink("upload/".$name);
    return mysqli_affected_rows($db);
}

$aktiviti = display("SELECT * FROM aktiviti");

?>
    <div class="content-wrapper" style="margin-left:0;margin-top:5%;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">AKTIVITI MASJID</h1>
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
                                <h3 class="card-title">SENARAI AKTIVITI</h3>
                                <a class="btn btn-primary float-right" href="Tambah_aktiviti.php" role="button">
                                    Tambah
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover data-table">
                                    <thead>
                                    <tr>
                                        <th>NO.</th>
                                        <th>AKTIVITI</th>
                                        <th>PEKARA</th>
                                        <th>TAMAT TEMPOH</th>
                                        <th>TINDAKAN</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $num = 1;
                                    foreach ($aktiviti as $data) {
                                        $current = date('Y-m-d');
                                        if ($data['tarikhtamat'] > $current) {
                                            ?>
                                            <tr>
                                                <td><?= $num++; ?></td>
                                                <td><?php if (!empty($data['tarikhtamat'])) { ?>
                                                        <img src="upload/<?= $data['gambar']; ?>"
                                                             width="25%"
                                                             title="Profile Picture" alt="profile">
                                                    <?php } else { ?>
                                                        <h5>Tiada Gambar</h5>
                                                    <?php } ?></td>
                                                <td><?= $data['nama'] ?></td>
                                                <td>
                                                    <?= $data['tarikhtamat'] ?>
                                                </td>
                                                <td>
                                                    <div class="offset-1 mt-2">
                                                        <a class="btn btn-primary print-invisible "
                                                           href="Maklumat_aktivtit.php?id=<?= $data['idaktiviti'] ?>">
                                                            Butiran
                                                            <i class="fas fa-info-circle"></i>
                                                        </a>
                                                        <a class="btn btn-success print-invisible "
                                                           href="Edit_aktiviti.php?id=<?= $data['idaktiviti'] ?>">
                                                            Edit
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } else {
                                            delete($data['idaktiviti'],$data['gambar']);
                                        }
                                    } ?>
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