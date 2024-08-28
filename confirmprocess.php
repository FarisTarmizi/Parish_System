<?php
session_start();
$db = mysqli_connect('localhost', 'root', '',
    'masjid_ulu_pauh');

if (isset($_POST['submit'])) {
    $nama = $_SESSION['nama'];
    $tel = $_SESSION['tel'];
    $alamat = $_SESSION['alamat'];
    $zon = $_SESSION['zon'];
    $pekerjaan = $_SESSION['pekerjaan'];
    $kpekerjaan = $_SESSION['kpekerjaan'];
    $kahwin = $_SESSION['status'];
    $ic = $_SESSION['ic'];
    $gaji = $_SESSION['gaji'];
    $bangsa = $_SESSION['bangsa'];

    $bantuan = $_SESSION['bantuan'];
    $bantuan_lain = $_SESSION['$bantuan_lain'];
    if ($bantuan == "LAIN-LAIN") {
        $bantuan = $bantuan_lain;
    }
    $menghuni = $_SESSION['menghuni'];
    $namawaris = $_SESSION['namawaris'];
    $icwaris = $_SESSION['icwaris'];
    $pekerjaanwaris = $_SESSION['pekerjaanwaris'];
    $kpekerjaanwaris = $_SESSION['kpekerjaanwaris'];

    $oku = $_SESSION['oku'];
    $joku = $_SESSION['joku'];
    $kadoku = $_SESSION['kadoku'];

    $namat = $_SESSION['namat'];
    $hubungant = $_SESSION['hubungant'];
    $ict = $_SESSION['ict'];
    $sekolaht = $_SESSION['sekolaht'];
    $okut = $_SESSION['okut'];
    $kadt = $_SESSION['kadt'];
    $anakt = $_SESSION['anakt'];
    $total = $_SESSION['total'];


    if (!empty($nama) && !empty($tel) && !empty($ic) && !empty($alamat) && !empty($zon) && !empty($bangsa) && !empty($oku)
        && !empty($kadoku) && !empty($kahwin) && !empty($menghuni) && !empty($pekerjaan) &&
        !empty($kpekerjaan) && !empty($gaji) && !empty($bantuan)) {

        $query = "INSERT INTO `kariah`(`nama`, `tel`, `alamat`, `zon`, `pekerjaan`, `kpekerjaan`, `ic`, `gaji`, `bangsa`
, `bantuan`, `menghuni`, `namawaris`, `pekerjaanwaris`,`icwaris`, `kpekerjaanwaris`, `oku`, `joku`, `kadoku`, `kahwin`) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($db, $query);
        mysqli_stmt_bind_param($stmt, "sssssssssssssssssss", $nama, $tel, $alamat, $zon, $pekerjaan,
            $kpekerjaan, $ic, $gaji, $bangsa, $bantuan, $menghuni, $namawaris, $icwaris, $pekerjaanwaris, $kpekerjaanwaris, $oku,
            $joku, $kadoku, $kahwin);

        if (sizeof($namat) > 0) {
            mysqli_stmt_execute($stmt);
            $tid = "SELECT LAST_INSERT_ID() AS last_Idkariah FROM kariah";
            $result = mysqli_query($db, $tid); //ambil id kariah
            $row = mysqli_fetch_assoc($result);
            $kariah = $row['last_Idkariah'];
            for ($i = 0; $i < $total; $i++) {
                $query2 = "INSERT INTO `tanggungan`(`Idtanggungan`, `nama`, `ic`, `hubungan`, 
                         `pekerjaan`, `oku`, `kadoku`, `yatim`, `kariah`) 
        VALUES (null,'$namat[$i]','$ict[$i]','$hubungant[$i]','$sekolaht[$i]','$okut[$i]','$kadt[$i]','$anakt[$i]','$kariah')";
                mysqli_query($db, $query2);
            }
            ?>
            <script>
                alert('Anda telah berjaya membuat permohonan bersama tanggungan');
                document.location = 'index.php';
            </script>
            <?php
        } else {
            mysqli_stmt_execute($stmt);
            ?>
            <script>
                alert('Anda telah berjaya membuat permohonan tanpa tanggungan');
                document.location = 'index.php';
            </script>
            <?php
        }
        mysqli_affected_rows($db);
        session_destroy();
        return exit();
    } else {
        ?>
        <script>
            alert('Borang Tidak Lengkap');
            document.location = 'Editborang.php';
        </script>
        <?php
        $_SESSION['nama'] = $nama;
        $_SESSION['ic'] = $ic;
        $_SESSION['tel'] = $tel;
        $_SESSION['alamat'] = $alamat;
        $_SESSION['zon'] = $zon;
        $_SESSION['bangsa'] = $bangsa;
        $_SESSION['oku'] = $oku;
        $_SESSION['kadoku'] = $kadoku;
        $_SESSION['joku'] = $joku;
        $_SESSION['status'] = $kahwin;
        $_SESSION['menghuni'] = $menghuni;
        $_SESSION['pekerjaan'] = $pekerjaan;
        $_SESSION['kpekerjaan'] = $kpekerjaan;
        $_SESSION['gaji'] = $gaji;
        $_SESSION['namawaris'] = $namawaris;
        $_SESSION['icwaris'] = $icwaris;
        $_SESSION['pekerjaanwaris'] = $pekerjaanwaris;
        $_SESSION['kpekerjaanwaris'] = $kpekerjaanwaris;
        $_SESSION['bantuan'] = $bantuan;
        $_SESSION['$bantuan_lain'] = $bantuan_lain;

        $_SESSION['namat'] = $namat;
        $_SESSION['hubungant'] = $hubungant;
        $_SESSION['ict'] = $ict;
        $_SESSION['sekolaht'] = $sekolaht;
        $_SESSION['okut'] = $okut;
        $_SESSION['kadt'] = $kadt;
        $_SESSION['anakt'] = $anakt;
        $_SESSION['total'] = $total;
        exit();
    }
}
?>