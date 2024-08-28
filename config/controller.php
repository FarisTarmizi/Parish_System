<?php //simpan semua function query

//dispaly data
function display($query){
    global $db; //panggil connection database

    $show = mysqli_query($db, $query);
    $row = [];
    
    while($rows = mysqli_fetch_assoc($show)){
        $row[]=$rows;
    }
    return $row;
}

//tambah data
function daftar($post){
    global $db;
    $nama = strip_tags($post['Nama']); // strip_tags utk security drpd unknown script
    $kp = strip_tags($post['Kp']);
    $umur = age($kp);
    $tel = strip_tags($post['Tel']);
    $alamat = strip_tags($post['Alamat']);
    $pekerjaan = strip_tags($post['Pekerjaan']);
    $gaji = strip_tags($post['Gaji']);
/*     $gaji = upload_file();
    validation pic
    if(!$gaji){
        echo"<script>
            alert('Sila Masukkan Slip Gaji');
            document.location.href='Borang.php';
        </script>";
        return false;
    } */

    $query="INSERT INTO `senarai_kariah`(`Id`, `Nama`, `Umur`, `Tel`, `Alamat`, `Pekerjaan`, `Kp`,`Gaji`) 
    VALUES (null,'$nama','$umur','$tel','$alamat','$pekerjaan','$kp','$gaji')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
// upload doc slip gaji
/* function upload_file(){
    $nma_pic = $_FILES['Gaji']['name'];
    $size = $_FILES['Gaji']['size'];
    $error = $_FILES['Gaji']['error'];
    $temp =  $_FILES['Gaji']['tmp_name'];

    //validation type of file
    $extensifileValid = ['pdf','png','jpeg','jpg'];
    $extensifile = explode('.',$nma_pic);
    $extensifile = strtolower(end($extensifile));
     if(!in_array($extensifile,$extensifileValid)){
        echo"<script>
        alert('Format file tidak sah');
        document.location.href='Borang.php';
        </script>";
        die();
     }

    //validationn size file not more 2mb
    if($size>2048000){
        echo"<script>
        alert('Saiz lebih had maximum');
        document.location.href='Borang.php';
        </script>";
        die();
    }

    // generate nma bru
    $new_name = uniqid();
    $new_name .= '.';
    $new_name .= $extensifile;

    //save ke local folder 
    move_uploaded_file($temp,'asset/img/' . $new_name);
    return $new_name;

} */

function ubah($post){
    global $db;
    $id = strip_tags($post['Id']);
    $nama = strip_tags($post['Nama']);
    $kp = strip_tags($post['Kp']);
    $umur = age($kp);
    $tel = strip_tags($post['Tel']);
    $alamat = strip_tags($post['Alamat']);
    $pekerjaan = strip_tags($post['Pekerjaan']);
    $gaji = strip_tags($post['Gaji']);

    $query="UPDATE `senarai_kariah` SET `Nama`='$nama',`Umur`='$umur',`Tel`='$tel',
    `Alamat`='$alamat',`Pekerjaan`='$pekerjaan',`Kp`='$kp',`Gaji`='$gaji' WHERE `Id` =$id";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function age($kp) //buat di papar maklumat jgk
{
    $birth_year  = substr($kp, 0, 2);
    $current_year = date('y');
    // Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
    $birth_year = ($birth_year > $current_year) ? $birth_year + 1900 : $birth_year + 2000;
    // Calculate the age
    return  date('Y') - $birth_year;
}

//tmbah status lulus
function Status($id){
    global $db;
    $query="UPDATE `senarai_kariah`SET `Status` = 'Lulus' WHERE `Id` =$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

//delete data
function delete($id){
    global $db;
    $query= "DELETE FROM `senarai_kariah` WHERE Id = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}