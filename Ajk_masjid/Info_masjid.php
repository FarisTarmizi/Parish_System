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

if (isset($_POST['ubah'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $history = $_POST['history'];

    $query = "UPDATE `masjid` SET `latarbelakang`='$history' WHERE Idmasjid  = 1";

    mysqli_query($db, $query);
    echo "<script>
      alert('Anda Berjaya Update Data');
      document.location='Info_masjid.php';
      </script>";
    mysqli_affected_rows($db);
    exit();
}

$data = display("SELECT * FROM masjid WHERE Idmasjid=1")[0];
$pic = display("SELECT * FROM aktiviti");
?>
<div class="content-wrapper  col-md-8 offset-md-2" style="margin-top:5%;">
    <section class="content md-3">
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-header ">
                <h1 class="mb-3">
                    Latar Belakang Masjid
                    <button type="button" class="btn btn-primary float-right" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">
                        UBAH
                        <i class="fas fa-edit"></i>
                    </button>
                </h1>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Ubah Latar Belakang Masjid</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form method="post"
                                  action="#">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="history" class="form-label">Latar Belakang:</label>

                                        <textarea name="history" id="history" cols="56" rows="15" class="form-control"
                                                  required><?= $data['latarbelakang']; ?>
                                        </textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        BATAL
                                    </button>
                                    <button type="submit" class="btn btn-primary" name="ubah">
                                        UBAH
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <h5><?= $data['latarbelakang']; ?></h5>
            </div>
            <div class="card-body"></div>
        </div>

        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h1 class="mb-3">
                    Carta Organisasi Masjid Ali-Imran
                    <a class="btn btn-primary" style="float:right;" href="Ajk.php" role="button">
                        UBAH
                        <i class="fas fa-edit"></i>
                    </a>
                </h1>
                <?php if (!empty($data['organisasi'])) { ?>
                    <img src="upload/<?= $data['organisasi']; ?>"
                         width="90%"
                         title="Profile Picture" alt="profile">
                <?php } else { ?>
                    <h5>Tiada Rekod</h5>
                <?php } ?>
            </div>
            <div class="card-body"></div>
        </div>
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <h1 class="mb-3">Pembangun Web</h1>
            </div>
            <div class="card-body ">
                <h4 class="text-center"> Pelajar Dari Politeknik Tuanku Syed Sirajuddin</h4>
                <table class="table table-bordered table-hover text-center ">
                    <tr>
                        <th><img src="assets_template/dist/img/ajim2.jpg" width="95px" alt="azim"></th>
                        <th><img src="assets_template/dist/img/wan.jpg " width="95px" alt="irfan"></th>
                        <th><img src="assets_template/dist/img/faris.jpg " width="95px" alt="faris"></th>
                    </tr>
                    <tr>
                        <td>MOHAMAD AZIM BIN ALANG AB.RAHMAN</td>
                        <td>WAN IRFAN BIN AZMI</td>
                        <td>MUHAMMAD FARIS BIN MOHD TARMIZI</td>
                    </tr>
                </table>
                <p class="float-right mt-3">Versi 1.0</p>
            </div>
        </div>
    </section>
</div>
<?php
include 'layout/footer.php'; ?>

