<?php
include 'layout/header2.php';
/*$id = (int)$_GET['id']; // ambik id dri url
$query = display("SELECT * FROM senarai_kariah WHERE Id=$id")[0];*/

$Nama = $_POST['Nama'];
$tel = $_POST['tel'];
$Kp = $_POST['Kp'];
$Umur = $_POST['Umur'];
$Alamat = $_POST['Alamat'];
$Bangsa = $_POST['Bangsa'];
$fizikal = $_POST['fizikal'];
$cacat2 = $_POST['cacat2'];
$OKU = $_POST['OKU'];
$status = $_POST['status'];
$menghuni = $_POST['menghuni'];
$Pekerjaan = $_POST['Pekerjaan'];
$JPekerjaan = $_POST['JPekerjaan'];
$Gaji = $_POST['Gaji'];
$NamaSIP = $_POST['NamaSIP'];
$PekerjaanSIP = $_POST['PekerjaanSIP'];
$KPekerjaan = $_POST['KPekerjaan'];
$Bantuan = $_POST['Bantuan'];

$NamaT=[];
$HubunganT=[];
$KpT=[] ;
$UmurT=[];
$SekolahT=[];
@$CacatT = [];
@$OKUT =[];
@$KadT =[];
@$AnakT =[];

/*$NamaT = $_POST['NamaT'];
$HubunganT= $_POST['HubunganT'];
$KpT = $_POST['KpT'];
$UmurT = $_POST['UmurT'];
$SekolahT = $_POST['SekolahT'];
@$CacatT = $_POST['CacatT'];
@$OKUT = $_POST['OKUT'];
@$KadT = $_POST['KadT'];
@$AnakT = $_POST['AnakT']; */



?>
<div class="container-fluid mt-3">
    <div class="card shadow p-3 mb-5 bg-body rounded">
        <div class="print-title text-center mb-3"></div>
        <div class="card-header">
            <h1>
                Butiran Pemohon
                <button onclick="printContent()" class="btn btn-secondary print-invisible float-right">
                    Print
                    <i class="fas fa-print"></i>
                </button>
                <script>
                    function printContent() {
                        window.print();
                    }
                </script>

            </h1>
        </div>
        <div class="card-body">
            <form action="confirmprocess.php" method="post">
                <div class="row">
                    <div class="mb-3 col-3">
                        <label for="Nama" class="form-label">Nama Penuh</label>
                        <p><?php echo $Nama;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="Umur" class="form-label">Umur</label>
                        <p><?php echo $Umur;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="Kp" class="form-label">NO. KP</label>
                        <p><?php echo $Kp;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="tel" class="form-label">NO. TEL</label>
                        <p><?php echo $tel;?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-4 col-3">
                        <label for="Bangsa" class="form-label">Bangsa</label>
                        <p><?php echo $Bangsa;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="Alamat" class="form-label">Alamat</label><br>
                        <p><?php echo $Alamat;?></p>
                    </div>
                    <div class="mb-4 col-3">
                        <label for="fizikal" class="form-label">Keadaan Fizikal</label>
                        <p><?php echo $fizikal;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="cacat2" class="form-label">Jenis kecacatan</label>
                        <p><?php echo $cacat2;?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="mb-3 col-3">
                        <label for="perkahwinan" class="form-label">Status perkahwinan</label>
                        <p><?php echo $status;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="Pekerjaan" class="form-label">Pekerjaan</label>
                        <p><?php echo $Pekerjaan;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="JPekerjaan" class="form-label">Jenis pekerjaan</label>
                        <p><?php echo $JPekerjaan;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="Gaji" class="form-label col-0">PENDAPATAN SEISI RUMAH</label>
                        <p><?php echo $Gaji;?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-3">
                        <label for="NamaSIP" class="form-label">Nama Suami/Isteri/Penjaga</label>
                        <p><?php echo $NamaSIP;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="KPekerjaan" class="form-label">Kategori pekerjaan Suami/Isteri/Penjaga</label>
                        <p><?php echo $PekerjaanSIP;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="KPekerjaan" class="form-label">Pekerjaan Suami/Isteri/Penjaga</label>
                        <p><?php echo $KPekerjaan;?></p>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="bantuan" class="form-label">Jenis bantuan yang pernah diterima:</label>
                        <p><?php echo $Bantuan;?></p>
                    </div>
                </div>
                <style>
                    table {
                        border-collapse: collapse;
                        width: 100%;
                        margin: 20px;
                    }

                    table, th, td {
                        border: 1px solid black;
                    }

                    th, td {
                        padding: 8px;
                        text-align: left;
                    }

                    input {
                        border: none;
                        width: 100%;
                    }
                </style>


                <!-- <label for="sendiri" class="form-label">Tanggungan</label> -->

                <!-- Table with five header columns and one editable row -->
       <!--          <table id="userTable">
                    <tr>
                        <th>Bil.</th>
                        <th>Nama</th>
                        <th>Hubungan</th>
                        <th>Umur</th>
                        <th>Nama Sekolah/Pekerjaan</th>
                        <th>Cacat</th>
                        <th>OKU</th>
                        <th>Kad OKU</th>
                        <th>Anak Yatim/Piatu</th>
                    </tr>
                    <?php
                        $NamaT = $_POST['NamaT'];
                        $HubunganT = $_POST['HubunganT'];
                        $KpT = $_POST['KpT'];
                        $UmurT = $_POST['UmurT'];
                        $SekolahT = $_POST['SekolahT'];
                        $CacatT = $_POST['CacatT'];
                        $OKUT = $_POST['OKUT'];
                        $KadT = $_POST['KadT'];
                        $AnakT = $_POST['AnakT']; 

                        if (is_array($NamaT) && !empty($NamaT)) {
                            $length = count($NamaT);
                            $bc = 1;
                            for ($i = 0; $i < $length; $i++) {
                                ?>
        <tr>
            <td><?php echo $bc++; ?></td>
            <td><?php echo $NamaT[$i]; ?></td>
            <td><?php echo $HubunganT[$i]; ?></td>
            <td><?php echo $UmurT[$i]; ?></td>
            <td><?php echo $SekolahT[$i]; ?></td>
            <td><?php echo $CacatT[$i]; ?></td>
            <td><?php echo $OKUT[$i]; ?></td>
            <td><?php echo $KadT[$i]; ?></td>
            <td><?php echo $AnakT[$i]; ?></td>
        </tr>
        <?php
    }
} else {
    echo "The variable \$NamaT is either not an array or is empty.";
}
?>

                </table> -->
                    <input class="form-check-input" type="checkbox" value="" id="invalidCheck"required>
                    <label class="form-check-label" for="invalidCheck">
                        Maklumat yang diberikan adalah benar
                    </label>

    <!-- Submit Button -->
    <button onclick="return submit();" type="submit" name="submit" class="mt-5 btn btn-primary btn-lg" style="float: right;">Daftar</button>

            </form>
        </div>
    </div>
</div>
<?php include 'layout/footer2.php';?>