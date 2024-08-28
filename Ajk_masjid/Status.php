<?php

$id = (int)$_GET['id']; // ambik id dri
function Status($id){
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $query="UPDATE `kariah` SET `status` = 'Disahkan' WHERE `Idkariah` =$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function delete($id){
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $query= "DELETE FROM `kariah` WHERE Idkariah = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function delete_sumbangan($id){
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $query= "DELETE FROM `jenis_bantuan` WHERE idbantuan = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

//kelulusan utk pemohon
if (isset($_POST['terima'])) {
    if (Status($id) > 0) {
        echo "<script>
            alert('Permohonan telah diluluskan');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memproses permohonan');
            document.location='Senarai_kariah.php';
        </script>";
    }
}

// delete data pemohon
elseif (isset($_POST['tolak'])) {
    if (delete($id) > 0) {
        echo "<script>
            alert('Permohonan telah ditolak');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal memproses permohonan');
            document.location='Senarai_kariah.php';
        </script>";
    }
}
elseif (isset($_POST['buang_sumbangan'])){
    if (delete_sumbangan($id) > 0) {
        echo "<script>
            alert('Berjaya Buang');
            document.location='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal buang!');
            document.location='Senarai_kariah.php';
        </script>";
    }
}
else {
    echo "<script>
        alert('Tindakan tidak sah');
        document.location='index.php';
    </script>";
}