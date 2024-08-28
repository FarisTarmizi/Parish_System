<?php
include "layout/header.php";
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

if (isset($_POST['submit'])) {
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

        $query = "INSERT INTO `aktiviti`(`gambar`, `nama`, `butiran`, `tarikhtamat`) 
VALUES ('$image','$nama','$tentang','$masa')";
        if (mysqli_query($db, $query)) {
            echo "<script>alert('Berjaya Ubah Aktiviti');document.location='aktiviti_masjid.php';</script> ";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($db);
        }

    } else {
        ?>
        <script>
            alert('Sila masukkan poster aktiviti!');
            document.location = "aktiviti_masjid.php";
        </script>
        <?php
        exit();
    }
    return mysqli_close($db);
}
?>

    <div class="container" style="margin-top:5%;">
        <h1>TAMBAH AKTIVITI</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">NAMA AKTIVITI</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>

            <div class="mb-3">
                <label for="tentang" class="form-label">PENERANGAN AKTIVITI</label><br>
                <textarea name="tentang" id="tentang" cols="70" rows="5" required></textarea>
            </div>

            <div class="mb-3">
                <label for="masa" class="form-label">TAMAT TEMPOH:</label>
                <input type="date" class="form-control" id="masa" name="masa" required>
            </div>

            <div class="mb-3">
                <label for="gmbr" class="form-label">GAMBAR/POSTER AKTIVITI:</label><br>
                <input type="file" name="gmbr"><br>
            </div>

            <a class="btn btn-danger mb-3" onclick="return confirm('Anda pasti untuk batal?')"
               href="aktiviti_masjid.php" role="button" style="float:left">
                Batal
            </a>
            <input type="submit" name="submit" class="mb-3 btn btn-primary"
                   style="float: right; width:80px;" value="Daftar">
        </form>
    </div>
<?php include "layout/footer.php"; ?>