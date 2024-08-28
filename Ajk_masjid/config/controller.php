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

//tambah data kariah
function daftar_kariah($post){
    global $db;

    // strip_tags utk security drpd unknown script
    $nama = strip_tags($post['nama']);
    $tel = strip_tags($post['tel']);
    $alamat = strip_tags($post['alamat']);
    $pekerjaan = strip_tags($post['pekerjaan']);
    $kpekerjaan = strip_tags($post['kpekerjaan']);
    $kahwin = strip_tags($post['status']);
    $ic = strip_tags($post['ic']);
    $gaji = strip_tags($post['gaji']);
    $bangsa = strip_tags($post['bangsa']);
    $bantuan = strip_tags($post['bantuan']);
    $menghuni = strip_tags($post['menghuni']);
    $namawaris = strip_tags($post['namawaris']);
    $pekerjaanwaris = strip_tags($post['pekerjaanwaris']);
    $kpekerjaanwaris = strip_tags($post['kpekerjaanwaris']);
    $oku = strip_tags($post['oku']);
    $joku = strip_tags($post['joku']);
    $kadoku = strip_tags($post['kadoku']);

    /*     $gaji = upload_file();
        validation pic
        if(!$gaji){
            echo"<script>
                alert('Sila Masukkan Slip Gaji');
                document.location.href='Borang.php';
            </script>";
            return false;
        } */

    $query="INSERT INTO `kariah`(`nama`, `tel`, `alamat`, `pekerjaan`, `kpekerjaan`, 
                     `ic`, `gaji`, `bangsa`, `bantuan`, `menghuni`, `namawaris`, `pekerjaanwaris`,
                     `kpekerjaanwaris`, `oku`, `joku`, `kadoku`, `kahwin`)
    VALUES ('$nama','$tel','$alamat','$pekerjaan','$kpekerjaan','$ic','$gaji','$bangsa'
            ,'$bantuan','$menghuni','$namawaris','$pekerjaanwaris','$kpekerjaanwaris','$oku'
            ,'$joku','$kadoku','$kahwin')";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function daftar_tanggungan($post,$id){
    global $db;

    // strip_tags utk security drpd unknown script
    $nama = strip_tags($post['namat']);
    $ic = strip_tags($post['ict']);
    $hubungan = strip_tags($post['hubungant']);
    $pekerjaan = strip_tags($post['sekolaht']);
    $oku= strip_tags($post['okut']);
    $kadoku= strip_tags($post['kadt']);
    $yatim = strip_tags($post['anakt']);
    $kariah = $id;


    $query="INSERT INTO `tanggungan`(`Idtanggungan`, `nama`, `ic`, `hubungan`, 
                         `pekerjaan`, `oku`, `kadoku`, `yatim`, `kariah`)
    VALUES (null,'$nama','$ic','$hubungan','$pekerjaan','$oku','$kadoku','$yatim','$kariah')";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}
function daftar_organisasi($post){
    global $db;

    // strip_tags utk security drpd unknown script
    $image= $_FILES["img"]["name"];
    $imge= $_FILES['img']['tmp_name'];
    $img = addslashes(file_get_contents($imge));

    $query="INSERT INTO  `masjid`(`organisasi`)
    VALUES ($img)";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function ubah_latarblkg($post){
    global $db;

    // strip_tags utk security drpd unknown script
    $image= $_FILES["img"]["name"];
    $imge= $_FILES['img']['tmp_name'];
    $img = addslashes(file_get_contents($imge));

    $query="INSERT INTO  `masjid`(`organisasi`)
    VALUES ($img)";

    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function ubah_kariah($post){
    global $db;
    $id = strip_tags($post['Id']);
    $nama = strip_tags($post['nama']);
    $tel = strip_tags($post['tel']);
    $alamat = strip_tags($post['alamat']);
    $pekerjaan = strip_tags($post['pekerjaan']);
    $kpekerjaan = strip_tags($post['kpekerjaan']);
    $kahwin = strip_tags($post['status']);
    $ic = strip_tags($post['ic']);
    $gaji = strip_tags($post['gaji']);
    $bangsa = strip_tags($post['bangsa']);
    $bantuan = strip_tags($post['bantuan']);
    $menghuni = strip_tags($post['menghuni']);
    $namawaris = strip_tags($post['namawaris']);
    $pekerjaanwaris = strip_tags($post['pekerjaanwaris']);
    $kpekerjaanwaris = strip_tags($post['kpekerjaanwaris']);
    $oku = strip_tags($post['oku']);
    $joku = strip_tags($post['joku']);
    $kadoku = strip_tags($post['kadoku']);


    $query="UPDATE `kariah` SET `nama`='$nama',`tel`='$tel',`alamat`='$alamat',
                    `pekerjaan`='$pekerjaan',`kpekerjaan`='$kpekerjaan',`ic`='$ic',
                    `gaji`='$gaji',`bangsa`='$bangsa',
                    `bantuan`='$bantuan',`menghuni`='$menghuni',`namawaris`='$namawaris',
                    `pekerjaanwaris`='$pekerjaanwaris',`kpekerjaanwaris`='$kpekerjaanwaris',`oku`='$oku',
                    `joku`='$joku',`kadoku`='$kadoku',`kahwin`='$kahwin' WHERE `Idkariah` =$id";

    if(mysqli_query($db, $query)){
        return mysqli_affected_rows($db);
    } else {
        return "Error: " . $query . "<br>" . mysqli_error($db);
    }
}
function ubah_tanggungan($post){
    global $db;
    $id = strip_tags($post['IdT']);
    $nama = strip_tags($post['Nama']);
    $ic = strip_tags($post['Nama']);
    $hubungan = strip_tags($post['Alamat']);
    $pekerjaan = strip_tags($post['Pekerjaan']);
    $oku= strip_tags($post['Gaji']);
    $kadoku= strip_tags($post['Gaji']);
    $yatim = strip_tags($post['Kp']);


    $query="UPDATE `tanggungan` SET `nama`='$nama',`ic`='$ic',
                            `hubungan`='$hubungan',`pekerjaan`='$pekerjaan',`oku`='$oku',
                            `kadoku`='$kadoku',`yatim`='$yatim' WHERE `Idtanggungan` = $id";

    if(mysqli_query($db, $query)){
        return mysqli_affected_rows($db);
    } else {
        return "Error: " . $query . "<br>" . mysqli_error($db);
    }
}

function age($kp)
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
    $query="UPDATE `kariah` SET `status` = 'Disahkan' WHERE `Id` =$id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

//delete data
function delete($id){
    global $db;
    $query= "DELETE FROM `kariah` WHERE Id = $id";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}