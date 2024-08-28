<?php
include "layout/header.php";

$id = (int)$_GET['id']; // ambik id dri url
function gmbr()
{
    $imge = $_FILES['gmbr']['name'];
    $sze = $_FILES['gmbr']['size'];
    $tmp_name = $_FILES['gmbr']['tmp_name'];

    $valid = ['jpg', 'jpeg', 'png'];
    $exten_file = explode('.', $imge);
    $exten_file = strtolower(end($exten_file));

    //check picture format validation
    if (!in_array($exten_file, $valid)) {
        ?>
        <script>
            alert('Format gambar salah! iaitu <?= $exten_file;?>');
            document.location = "aktiviti_masjid.php";
        </script>
        <?php
        exit();
    }

    //size gambar
    if ($sze > 2048000) {
        ?>
        <script>
            alert('Maximum size gambar hanya 2MB sahaja!');
            document.location = "aktiviti_masjid.php";
        </script>
        <?php
        exit();
    }

    $image = uniqid();
    $image .= '.';
    $image .= $exten_file;

    // bwk masuk ke folder
    move_uploaded_file($tmp_name, 'upload/' . $image);
    return $image;
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

if (isset($_POST['ubah'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $nama = strtoupper($_POST['nama']);
    $tentang = strtoupper($_POST['tentang']);
    $masa = $_POST['masa'];

    if ($_FILES["gmbr"]["name"]) {
        $image = gmbr();

        $query = "UPDATE `aktiviti` SET `gambar`='$image',`nama`='$nama',
                      `butiran`='$tentang',`tarikhtamat`='$masa' WHERE `idaktiviti`=$id";
        if (mysqli_query($db, $query)) {
            echo "<script>alert('Berjaya Ubah Aktiviti');document.location='aktiviti_masjid.php';</script> ";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }

    } else {
        $query = "UPDATE `aktiviti` SET `nama`='$nama',
                  `butiran`='$tentang',`tarikhtamat`='$masa' WHERE `idaktiviti`=$id";
        if (mysqli_query($db, $query)) {
            echo "<script>alert('Berjaya Ubah Aktiviti');document.location='aktiviti_masjid.php';</script> ";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }
    }
    return mysqli_close($db);
} else {
    $aktiviti = display("SELECT * FROM aktiviti WHERE idaktiviti=$id")[0];
    ?>
    <div class="container mt-5 offset-md-2" style="margin-top:5%;">
        <h1>EDIT AKTIVITI</h1>
        <hr>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="Id" value="<?= $aktiviti['idaktiviti']; ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">NAMA AKTIVITI</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $aktiviti['nama']; ?>">
            </div>

            <div class="mb-3">
                <label for="tentang" class="form-label">PENERANGAN AKTIVITI</label><br>
                <textarea name="tentang" id="tentang" cols="70" rows="5"
                          required><?= $aktiviti['butiran']; ?></textarea>
            </div>

            <div class="mb-3">
                <label for="masa" class="form-label">TAMAT TEMPOH</label>
                <input type="date" class="form-control" id="masa" name="masa" value="<?= $aktiviti['tarikhtamat']; ?>">
            </div>

            <div class="mb-3">
                <input type="file" name="gmbr"><br>
                <label for="gmbr" class="form-label">GAMBAR/POSTER AKTIVITI:</label><br>
                <?php
                if (!empty($aktiviti['gambar'])) {
                    ?>
                    <img src="upload/<?= $aktiviti['gambar']; ?>"
                         width="30%"
                         title="Profile Picture" alt="profile">
                    <?php } else { ?>
                    <h5>Tiada Gambar</h5>
                    <?php
                } ?>
            </div>

            <a class="btn btn-danger" href="aktiviti_masjid.php" onclick="return confirm('Anda pasti untuk batal?')"
               role="button" style="float:left">
                Batal
            </a>

            <input type="submit" name="ubah" class="btn btn-success mb-3" style="float: right; width: 80px"
                   value="Ubah">
        </form>
    </div>
<?php }
include "layout/footer.php";