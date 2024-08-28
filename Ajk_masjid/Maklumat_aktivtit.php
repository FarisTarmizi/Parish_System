<?php
include "layout/header.php";

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

function delete($id)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $query = "DELETE FROM `aktiviti` WHERE idaktiviti = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

if (isset($_POST['delete'])) {
    if (delete($id) > 0) {
        echo "<script>
            alert('Rekod Aktiviti Dipadam');
            document.location='aktiviti_masjid.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal Padam Rekod Aktiviti');
            document.location='aktiviti_masjid.php';
        </script>";
    }
} else {

    $aktiviti = display("SELECT * FROM aktiviti WHERE idaktiviti=$id")[0];
    ?>
    <div class="container offset-md-2" style="margin-top:5%;">
        <h1>BUTIRAN AKTIVITI</h1>
        <a class="btn btn-success float-right" href="Edit_aktiviti.php?id=<?= $aktiviti['idaktiviti']?>"
           role="button" >
            <i class="fas fa-edit"></i>
            Ubah
        </a>
        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="Nama" class="form-label">NAMA AKTIVITI</label>
                <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $aktiviti['nama']; ?>"
                       readonly>
            </div>

            <div class="mb-3">
                <label for="tentang" class="form-label">PENERANGAN AKTIVITI</label><br>
                <textarea name="tentang" id="tentang" cols="153" rows="5" readonly><?= $aktiviti['butiran']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="masa" class="form-label">TAMAT TEMPOH</label>
                <input type="date" class="form-control" id="masa" name="masa" value="<?= $aktiviti['tarikhtamat']; ?>"
                       readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">GAMBAR/POSTER AKTIVITI:</label>
                <br>
                <img src="upload/<?=$aktiviti['gambar'];?>"
                     width="30%"
                     title="Profile Picture" alt="profile">
            </div>
            <input type="submit" name="delete" onclick="return confirm('Anda pasti untuk buang?')"
                   class="btn btn-danger print-invisible mb-3" value="Padam"  style="float: left; width: 80px">
        </form>
    </div>
    <?php
}
include "layout/footer.php";