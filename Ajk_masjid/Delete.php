<?php
include 'config/app.php';

$id = (int)$_GET['id']; // ambik id dri url

function delete($id)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $query = "DELETE FROM `kariah` WHERE Idkariah = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function delete_aktiviti($id)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $query = "DELETE FROM `aktiviti` WHERE idaktiviti = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function asnaf($id)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $updt = "UPDATE `kariah` SET `asnaf`='YA' WHERE Idkariah=$id";
    mysqli_query($db, $updt);
    return mysqli_affected_rows($db);
}

// delete data pemohon
if (isset($_POST['tolak'])) {
    if (delete($id) > 0) {
        echo "<script>
            alert('Berjaya padam data');
            document.location='Senarai_kariah.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal memadam data');
            document.location='index.php';
            </script>";
    }
} elseif (isset($_POST['delete'])) {
    if (delete_aktiviti($id) > 0) {
        echo "<script>
            alert('Berjaya padam data');
            document.location='Senarai_kariah.php';
            </script>";
    } else {
        echo "<script>
            alert('Gagal memadam data');
            document.location='index.php';
            </script>";
    }
} elseif (isset($_POST['asnaf'])) {
    if (asnaf($id) > 0) {
        ?>
        <script>
            alert('Berjaya tambah data golongan asnaf');
            document.location = 'Maklumat_pemohon.php?id=<?= $id; ?>';
        </script>
        <?php
    } else {
        echo "<script>
            alert('Gagal memadam data');
            document.location='index.php';
            </script>";
    }
} else {
    echo "<script>
        alert('Gagal buat sebarang tindakan');
        document.location='index.php';
        </script>";
}