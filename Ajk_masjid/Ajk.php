<?php
include 'layout/header.php';

function gmbr()
{
    $imge = $_FILES['carta']['name'];
    $sze = $_FILES['carta']['size'];
    $tmp_name = $_FILES['carta']['tmp_name'];

    $valid = ['jpg', 'jpeg', 'png'];
    $exten_file = explode('.', $imge);
    $exten_file = strtolower(end($exten_file));

    //check picture format validation
    if (!in_array($exten_file, $valid)) {
        ?>
        <script>
            alert('Format gambar salah!');
            document.location = "Info_masjid.php";
        </script>
        <?php
        exit();
    }

    //size gambar
    if ($sze > 2048000) {
        ?>
        <script>
            alert('Maximum size gambar hanya 2MB sahaja!');
            document.location = "Info_masjid.php";
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
    $img = gmbr();

    $query = "UPDATE `masjid` SET `organisasi`='$img' WHERE Idmasjid  = 1";

    mysqli_query($db, $query);
    if (mysqli_affected_rows($db) > 0) {
        echo "<script>
            alert('Anda Berjaya Update Data');
            document.location='Info_masjid.php';
            </script>";
        return mysqli_affected_rows($db);
    } else {
        echo "<script>
            alert('Tiada Perubahan Dilakukan');
            document.location='Info_masjid.php';
            </script>";
    }
} else {
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

    $data = display("SELECT * FROM masjid WHERE Idmasjid=1")[0];
    ?>
    <div class="container offset-md-2" style="margin-top:5%;">
        <h1>Carta Organisasi Masjid Ali-Imran</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="carta">Masukkan Gambar:</label>
                <input type="file" id="carta" name="carta"><br>
            </div>

            <div class="mb-3">
                CARTA SEBELUM:<br>
                <?php if (!empty($data['organisasi'])) { ?>
                    <img src="upload/<?= $data['organisasi'];?>"
                         width="50%" title="Profile Picture" alt="profile">
                <?php } else { ?>
                    <h5>Tiada Rekod</h5>
                <?php } ?>
            </div>

            <a class="btn btn-danger mb-3" onclick="return confirm('Anda pasti untuk batal?')"
               href="Info_masjid.php" role="button" style="float:left">
                Batal
            </a>

            <input name="submit" type="submit" class="btn btn-success" style="float: right;" value="Ubah">
        </form>
    </div>
    <?php
}
include 'layout/footer.php';
