<?php
include 'layout/header.php';

$id = (int)$_GET['id']; // ambik id dri url
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

function ubah_kariah($post)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $id = $post['Id'];
    $nama = strtoupper($post['nama']);
    $tel = $post['tel'];
    $zon = $post['zon'];
    $alamat = $post['alamat'];
    $pekerjaan = $post['pekerjaan'];
    $kpekerjaan = $post['kpekerjaan'];
    $kahwin = $post['status'];
    $ic = $post['ic'];
    $gaji = $post['gaji'];
    $bangsa = $post['bangsa'];
    $bantuan = $post['bantuan'];
    $menghuni = $post['menghuni'];
    $namawaris = !empty($post['namawaris']) ? strtoupper($post['namawaris']) : "tiada";
    $icwaris = !empty($post['icwaris']) ? $post['icwaris']: "tiada";
    $pekerjaanwaris = !empty($post['pekerjaanwaris']) ? $post['pekerjaanwaris'] : "tiada";
    $kpekerjaanwaris = !empty($post['kpekerjaanwaris']) ? $post['kpekerjaanwaris'] : "tiada";
    $oku = $post['oku'];
    $joku = $post['joku'];
    $kadoku = $post['kadoku'];

    $row = $post['rowCount']-1;
    $a=1;
    $namat = $hubungant = $ict = $umurt = $sekolaht = $okut = $kadt = $anakt = array(); // Initialize arrays to store values
    for ($d = 0;  $row>$d; $d++) {
        $namat[$d] = $post['namat'.$a];
        $hubungant[$d] = $post['hubungant'.$a];
        $ict[$d] = $post['ict'.$a];
        $umurt[$d] = $post['umurt'.$a];
        $sekolaht[$d] = $post['sekolaht'.$a];
        $okut[$d] = isset($post['okut'.$a]) ? $post['okut'.$a] : 'No';
        $kadt[$d] = isset($post['kadt'.$a]) ?$post['kadt'.$a] : 'No';
        $anakt[$d] = isset($post['anakt'.$a]) ? $post['anakt'.$a] : 'No';
        $a++;
    }


    $query = "UPDATE `kariah` SET `nama`='$nama',`tel`='$tel',`alamat`='$alamat',
                    `pekerjaan`='$pekerjaan',`kpekerjaan`='$kpekerjaan',`ic`='$ic',
                    `gaji`='$gaji',`bangsa`='$bangsa',`zon`='$zon',
                    `bantuan`='$bantuan',`menghuni`='$menghuni',`namawaris`='$namawaris',`icwaris`='$icwaris',
                    `pekerjaanwaris`='$pekerjaanwaris',`kpekerjaanwaris`='$kpekerjaanwaris',`oku`='$oku',
                    `joku`='$joku',`kadoku`='$kadoku',`kahwin`='$kahwin' WHERE `Idkariah` =$id";

    if (sizeof($namat) > 0) {
        mysqli_query($db, $query);
        for ($i = 0; $i < $row; $i++) {
            $query2 = "UPDATE `tanggungan` SET `nama`='$namat[$i]',`ic`='$ict[$i]',`hubungan`='$hubungant[$i]',`pekerjaan`='$sekolaht[$i]',`oku`='$okut[$i]',
                        `kadoku`='$kadt[$i]',`yatim`='$anakt[$i]'WHERE kariah=$id";
            return mysqli_query($db, $query2);
        }
    }
    return mysqli_affected_rows($db);
}

function age($kp)
{
    $birth_year = substr($kp, 0, 2);
    $current_year = date('y');
    // Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
    $birth_year = ($birth_year > $current_year) ? (int)$birth_year + 1900 : (int)$birth_year + 2000;
    // Calculate the age
    return date('Y') - $birth_year;
}

if (isset($_POST['ubah'])) {
    if (ubah_kariah($_POST) > 0) {
        ?>
        <script>
      alert('Anda Berjaya Ubah Data Seorang Kariah');
      document.location='Maklumat_pemohon.php?id=<?=$id;?>';
      </script>
        <?php
    } else {
        echo "<script>
      alert('Anda Gagal Ubah Data');
      document.location='Senarai_kariah.php';
      </script>";
    }
}

$query = display("SELECT * FROM kariah WHERE Idkariah=$id")[0];
$tquery = display("SELECT * FROM tanggungan WHERE kariah=$id");
$jbantuan = display("SELECT * FROM `jenis_bantuan`");
?>
    <div class="container" style="margin-top:5%;">
        <h1>UBAH BUTIRAN KARIAH MASJID ULU PAUH</h1>
        <hr>
        <form action=" " method="post" enctype="multipart/form-data">

            <input type="hidden" class="form-control" id="Id" name="Id" value="<?= $query['Idkariah'] ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Penuh</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $query['nama'] ?>"
                       placeholder="Nama Penuh">
            </div>


            <div class="row">
                <div class="mb-3 col-3">
                    <label for="tel" class="form-label">NO. TEL</label>
                    <input type="tel" class="form-control" id="tel" name="tel" value="<?= $query['tel'] ?>"
                           placeholder="+60">
                </div>

                <div class="mb-3 col-4">
                    <label for="ic" class="form-label">NO. KP</label>
                    <input type="text" class="form-control" id="ic" name="ic" placeholder="tanpa-"
                           value="<?= $query['ic'] ?>" minlength="12" maxlength="12" onkeyup="age();">
                </div>

                <div class="mb-3 col-2">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="number" class="form-control" id="umur" name="umur" value="<?= age($query['ic']) ?>"
                           readonly>
                </div>
                <script>
                    function age() {
                        // Assuming you have the 'id' variable containing the date in the format 'ddmmyyhhmmss'
                        var id = document.getElementById('ic').value;

                        // Extract year from the sequence
                        var year = id.substring(0, 2);

                        // Get the current year
                        var currentYear = new Date().getFullYear() % 100; // Get last two digits of the current year

                        // Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
                        year = (year > currentYear) ? 1900 + parseInt(year) : 2000 + parseInt(year);

                        // Calculate the age
                        // Display the calculated age in the "Umur" input field
                        document.getElementById('umur').value = new Date().getFullYear() - year;


                    }
                </script>

            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label><br>
                <textarea name="alamat" id="alamat" cols="70" rows="5"><?= $query['alamat'] ?></textarea>
            </div>

            <div class="row">
                <div class="mb-3 col-2">
                    <label for="Poskod" class="form-label">Poskod</label>
                    <input type="text" class="form-control" id="Poskod" name="Poskod" placeholder="Poskod" value="02600"
                           readonly>
                </div>
                <div class="mb-3 col-2">
                    <label for="Negeri" class="form-label">Negeri</label>
                    <input type="text" class="form-control" id="Negeri" name="Negeri" placeholder="Negeri"
                           value="Perlis" readonly>
                </div>
            </div>

            <div class="mb-4 col-3">
                <label for="zon" class="form-label">Zon</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="zon">
                    <option selected>Zon</option>
                    <option value="Zon 001" <?php if ($query['zon'] == 'Zon 001') echo "selected"; ?>>Zon 001</option>
                    <option value="Zon 002" <?php if ($query['zon'] == 'Zon 002') echo "selected"; ?>>Zon 002</option>
                    <option value="Zon 003" <?php if ($query['zon'] == 'Zon 003') echo "selected"; ?>>Zon 003</option>
                    <option value="Zon 004" <?php if ($query['zon'] == 'Zon 004') echo "selected"; ?>>Zon 004</option>
                    <option value="Zon 005" <?php if ($query['zon'] == 'Zon 005') echo "selected"; ?>>Zon 005</option>
                    <option value="Zon 006" <?php if ($query['zon'] == 'Zon 006') echo "selected"; ?>>Zon 006</option>
                    <option value="Zon 007" <?php if ($query['zon'] == 'Zon 007') echo "selected"; ?>>Zon 007</option>
                    <option value="Zon 008" <?php if ($query['zon'] == 'Zon 008') echo "selected"; ?>>Zon 008</option>
                    <option value="Zon 009" <?php if ($query['zon'] == 'Zon 009') echo "selected"; ?>>Zon 009</option>
                    <option value="Zon 010" <?php if ($query['zon'] == 'Zon 010') echo "selected"; ?>>Zon 010</option>
                    <option value="Zon 011" <?php if ($query['zon'] == 'Zon 011') echo "selected"; ?>>Zon 011</option>
                    <option value="Zon 012" <?php if ($query['zon'] == 'Zon 012') echo "selected"; ?>>Zon 012</option>
                </select>
            </div>

            <div class="mb-4 col-3">
                <label for="bangsa" class="form-label">Bangsa</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="bangsa">
                    <option selected>Bangsa</option>
                    <option value="Melayu" <?php if ($query['bangsa'] == 'Melayu') echo "selected"; ?>>Melayu</option>
                    <option value="Cina" <?php if ($query['bangsa'] == 'Cina') echo "selected"; ?>>Cina</option>
                    <option value="India" <?php if ($query['bangsa'] == 'India') echo "selected"; ?>>India</option>
                    <option value="Lain-lain" <?php if ($query['bangsa'] == 'Lain-lain') echo "selected"; ?>>Lain-lain
                    </option>
                </select>
            </div>


            <div class="col-20 mb-4">
                <div>
                    <label for="oku" class="form-label">Keadaan Fizikal</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="oku" id="oku"
                           value="oku" <?php if ($query['oku'] == 'oku') echo "checked"; ?> >
                    <label class="form-check-label" for="cacat">Cacat</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="oku" id="tidak"
                           value="tidak" <?php if ($query['oku'] == 'tidak' || $query['oku'] == 'Tidak Berkenaan') echo "checked"; ?> >
                    <label class="form-check-label" for="tidak">Tidak berkaitan</label>
                </div>

                <div class="col-3">
                    <label for="joku" class="form-label">Nyatakan jenis kecacatan</label>
                    <input type="text" class="form-control" id="joku" name="joku"
                           value="<?php if (empty($query['joku'])){
                               echo 'tiada';
                           }else{
                               echo $query['joku'];
                           } ?>">
                </div>
            </div>

            <div>
                <label for="kadoku" class="form-label">Kad OKU</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="kadoku" id="kadoku"
                       value="OKU" <?php if ($query['kadoku'] == 'OKU') echo "checked"; ?>>
                <label class="form-check-label" for="OKU">Ada</label>
            </div>
            <div class="form-check form-check-inline mb-4">
                <input class="form-check-input" type="radio" name="kadoku" id="kadoku"
                       value="tiada" <?php if ($query['kadoku'] == 'tiada') echo "checked"; ?>>
                <label class="form-check-label" for="tiada">Tiada</label>
            </div>

            <div class="mb-4">
                <div>
                    <label for="perkahwinan" class="form-label">Status perkahwinan</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="Bujang"
                           value="Bujang" <?php if ($query['kahwin'] == 'Bujang') echo "checked"; ?>>
                    <label class="form-check-label" for="Bujang">Bujang</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="Kahwin"
                           value="Kahwin" <?php if ($query['kahwin'] == 'Kahwin') echo "checked"; ?>>
                    <label class="form-check-label" for="Kahwin">Kahwin</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="Janda"
                           value="Janda" <?php if ($query['kahwin'] == 'Janda') echo "checked"; ?>>
                    <label class="form-check-label" for="Janda">Janda</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="Duda"
                           value="Duda" <?php if ($query['kahwin'] == 'Duda') echo "checked"; ?>>
                    <label class="form-check-label" for="Duda">Duda</label>
                </div>
            </div>

            <div class="mb-4">
                <div>
                    <label for="menghuni" class="form-label">Menghuni</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="menghuni" id="rsendiri"
                           value="rsendiri" <?php if ($query['menghuni'] == 'rsendiri') echo "checked"; ?>>
                    <label class="form-check-label" for="rsendiri">Rumah Sendiri</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="menghuni" id="rsewa"
                           value="rsewa" <?php if ($query['menghuni'] == 'rsewa') echo "checked"; ?>>
                    <label class="form-check-label" for="rsewa">Rumah Sewa</label>
                </div>
            </div>


            <div class="row">
                <div class="mt-4 col-3">
                    <label for="kpekerjaan" class="form-label">Pekerjaan</label>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="kpekerjaan"
                    >
                        <option value="Kerajaan" <?php if ($query['kpekerjaan'] == 'Kerajaan') echo "selected"; ?>>
                            Kerajaan
                        </option>
                        <option value="Swasta" <?php if ($query['kpekerjaan'] == 'Swasta') echo "selected"; ?>>
                            Swasta
                        </option>
                        <option value="Sendiri" <?php if ($query['kpekerjaan'] == 'Sendiri') echo "selected"; ?>>
                            Sendiri
                        </option>
                        <option value="Pencen" <?php if ($query['kpekerjaan'] == 'Pencen') echo "selected"; ?>>
                            Pencen
                        </option>
                        <option value="Tidak bekerja" <?php if ($query['kpekerjaan'] == 'Tidak bekerja') echo "selected"; ?>>
                            Tidak bekerja
                        </option>
                    </select>
                    <label for="pekerjaan" class="form-label">Nyatakan jenis pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                           value="<?= $query['pekerjaan'] ?>">
                </div>

                <div class="mt-4 col-3">
                    <label for="gaji" class="form-label col-0">PENDAPATAN SEISI RUMAH</label>
                    <select class="form-select" aria-label="Default select example" name="gaji">
                        <option selected>Julat Gaji</option>
                        <option value="<2500" <?php if ($query['gaji'] == '<2500') echo "selected"; ?>> kurang 2,500
                        </option>
                        <option value="2501-3170" <?php if ($query['gaji'] == '2501-3170') echo "selected"; ?>>
                            2,501-3,170
                        </option>
                        <option value="3171-4850" <?php if ($query['gaji'] == '3171-4850') echo "selected"; ?>>
                            3,171-4,850
                        </option>
                        <option value="4851-7100" <?php if ($query['gaji'] == '4851-7100') echo "selected"; ?>>
                            4,851-7,100
                        </option>
                        <option value="7101-10970" <?php if ($query['gaji'] == '7101-10970') echo "selected"; ?>>
                            7,101-10,970
                        </option>
                        <option value="10971-15040" <?php if ($query['gaji'] == '10971-15040') echo "selected"; ?>>
                            10,971-15,040
                        </option>
                        <option value=">15051" <?php if ($query['gaji'] == '>15051') echo "selected"; ?>>lebih 15,051
                        </option>
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <label for="namawaris" class="form-label">Nama Suami/Isteri/Penjaga</label>
                <input type="text" class="form-control" id="namawaris" name="namawaris"
                       placeholder="Nama Suami/Isteri/Penjaga" value="<?= $query['namawaris'] ?>">
            </div>
            <div class="mb-3 col-4">
                <label for="icwaris" class="form-label">NO. KP Suami/Isteri/Penjaga</label>
                <input type="text" class="form-control" id="icwaris" name="icwaris" placeholder="tanpa-"
                       value="<?php
                       if(empty($query['icwaris']))
                           echo "tiada";
                       else
                           echo $query['icwaris'];?>" minlength="12" maxlength="12">
            </div>


            <div class="mt-4 col-4 mb-4">
                <label for="kpekerjaanwaris" class="form-label">Kategori pekerjaan Suami/Isteri/Penjaga</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="kpekerjaanwaris">
                    <option value="<?php echo $query['kpekerjaanwaris']; ?>"><?php echo $query['kpekerjaanwaris']; ?></option>
                    <option value="Kerajaan">Kerajaan</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Sendiri">Sendiri</option>
                    <option value="Pencen">Pencen</option>
                    <option value="Tidak bekerja">Tidak bekerja</option>
                </select>
                <label for="pekerjaanwaris" class="form-label">Nyatakan jenis pekerjaan Suami/Isteri/Penjaga</label>
                <input type="text" class="form-control" id="pekerjaanwaris" name="pekerjaanwaris"
                       value="<?php echo $query['pekerjaanwaris']; ?>">
            </div>


            <div>
                <label for="bantuan" class="form-label">Jenis bantuan yang pernah diterima:</label>
            </div>
            <div class="mb-4">
                <select class="form-select" aria-label="Default select example" name="bantuan">
                    <option value="<?= $query['bantuan']; ?>"><?= $query['bantuan']; ?></option>
                    <option value="Tidak Terima">Tidak Terima</option>
                    <?php
                    foreach ($jbantuan as $item) {
                        ?>
                        <option value="<?= $item['nama']; ?>">
                            <?= $item['nama']; ?>
                        </option>
                    <?php } ?>
                </select><br>
                <label for="lain" class="form-label">Nyatakan jika lain-lain bantuan:</label>
                <input type="text" class="form-control col-4 mb-4" id="lain" name="lain" value="tiada">
            </div>


            <div>
                <label for="tanggungan" class="form-label">Tanggungan Pemohon:</label>
            </div>
            <?php
            if (!empty($tquery)) {
                ?>
                <label for="sendiri" class="form-label">Ahli Keluarga Dibawah Tanggungan</label>
                <table id="userTable" class="table table-bordered table-hover data-table table-responsive">
                    <tr>
                        <th rowspan="2">Bil.</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Hubungan</th>
                        <th rowspan="2">NO.KP</th>
                        <th rowspan="2">Nama Sekolah/Pekerjaan</th>
                        <th colspan="3">Tanda jika berkenaan</th>
                    </tr>
                    <tr>
                        <th>OKU</th>
                        <th>Kad OKU</th>
                        <th>Anak Yatim/Piatu</th>
                    </tr>
                    <?php
                    $num =$index= 1;
                    foreach ($tquery as $data) {
                        ?>
                        <tr>
                            <td><?= $num++; ?></td>
                            <td contenteditable="true">
                                <input type="text" name="namat<?= $index; ?>" value="<?= strtoupper($data['nama']) ?>">
                            </td>
                            <td contenteditable="true"><input type="text" name="hubungant<?= $index; ?>"
                                                              value="<?= $data['hubungan'] ?>"></td>
                            <td contenteditable="true"><input type="text" name="ict<?= $index; ?>"
                                                              value="<?= $data['ic']; ?>">
                            </td>
                            <td contenteditable="true"><input type="text" name="sekolaht<?= $index; ?>"
                                                              value="<?= $data['pekerjaan'] ?>"></td>
                            <td><input type="checkbox" name="okut<?= $index; ?>"
                                       value="Yes" <?php if ($data['oku'] == 'Yes') echo "checked"; ?>>
                            </td>
                            <td><input type="checkbox" name="kadt<?= $index; ?>"
                                       value="Yes" <?php if ($data['kadoku'] == 'Yes') echo "checked"; ?>>
                            </td>
                            <td><input type="checkbox" name="anakt<?= $index; ?>"
                                       value="Yes" <?php if ($data['yatim'] == 'Yes') echo "checked"; ?>>
                            </td>
                        </tr>
                    <?php
                    $index++;
                    } ?>
                </table>
                <input type="hidden" value="<?=$num;?>" name="rowCount">
                <script>
                    function age2(uniqueId) {
                        // Assuming you have the 'id' variable containing the date in the format 'ddmmyyhhmmss'
                        document.getElementById(`umurt_${uniqueId.split('_')[1]}`).value;

                        // Extract year from the sequence
                        var year = id.substring(0, 2);

                        // Get the current year
                        var currentYear = new Date().getFullYear() % 100; // Get last two digits of the current year

                        // Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
                        year = (year > currentYear) ? 1900 + parseInt(year) : 2000 + parseInt(year);

                        // Calculate the age
                        // Display the calculated age in the "Umur" input field
                        document.getElementById(`umurt_${uniqueId.split('_')[1]}`).value = new Date().getFullYear() - year;
                    }
                </script>
            <?php
            } else {
            ?>
                <table id="userTable" class="table table-bordered table-hover data-table table-responsive">
                    <tr>
                        <th rowspan="2">Bil.</th>
                        <th rowspan="2">Nama</th>
                        <th rowspan="2">Hubungan</th>
                        <th rowspan="2">NO.KP</th>
                        <th rowspan="2">Umur</th>
                        <th rowspan="2">Nama Sekolah/Pekerjaan</th>
                        <th colspan="3">Tanda jika berkenaan</th>
                    </tr>
                    <tr>
                        <th>OKU</th>
                        <th>Kad OKU</th>
                        <th>Anak Yatim/Piatu</th>
                    </tr>
                    <tr class="text-center">
                        <td colspan="7">Tiada Tanggungan</td>
                    </tr>
                </table>
                <?php
            }
            ?>
            <button type="submit" name="ubah"
                    class="mb-5 btn btn-primary" style="float: right;">Ubah
            </button>
        </form>
    </div>
<?php
include 'layout/footer.php';
?>