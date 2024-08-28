<?php
//get value from form
$nama = $_POST['nama'];
$pass = $_POST['pass'];

if (isset($_POST['remember'])) {
    $expired = time() + 365 * 24 * 60 * 60;
    setcookie('uname', $nama, $expired);
    setcookie('pass', $pass, $expired);
}

if (isset($_POST['login'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    //check textfield
    if (empty($nama && $pass)) {
        echo "<script>
    alert('Sila isi nama pengguna dan kata laluan');
    document.location='login.php'; 
    </script>";
    } else {
        $data = "SELECT * FROM ajk WHERE username='$nama' and password='$pass'";
        $result = $db->query($data);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            //validation check
            if ($row['username'] == "masjidulupauh" && $row['password'] == "ajk123") {
                //authorized user
                header('Location:Ajk_masjid/index.php');
            } else {
                echo "<script>
            alert('Bukan Ajk Masjid!');
        </script>";
            }
        }

    }
}