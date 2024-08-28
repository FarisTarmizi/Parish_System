<?php
if (isset($_POST['ubah'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $old = $_POST['pass1'];
    $new = $_POST['pass2'];
    $confirm = $_POST['pass3'];
    $password = 'ajk123';

    if (!empty($old) && !empty($new) && !empty($confirm)) {
        if ($confirm == $new) {
            if ($old == $password) {
                $query = "UPDATE `ajk` SET `password`='$new' WHERE  Idmasjid  = 1";
                $pass = mysqli_query($db, $query);

                if ($pass) {
                    echo "<script>
                        alert('Anda Berjaya Ubah Kata Laluan');
                        document.location='index.php';
                    </script>";
                } else {
                    echo "<script>
                        alert('Ada Masalah Berlaku: " . mysqli_error($db) . "');
                        document.location='index.php';
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Kata Laluan Lama Tidak Betul');
                    document.location='index.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Kedua-dua Kata Laluan Baru Tidak Sama');
                document.location='index.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Borang Tidak Lengkap');
            document.location='index.php';
        </script>";
    }

    mysqli_close($db);
}
