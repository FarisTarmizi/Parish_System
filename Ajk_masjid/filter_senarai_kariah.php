<?php
include 'layout/header_nopreload.php';

function display($query)
{
    /*$db = mysqli_connect('ftp.kptsspb.com.my', 'kptsspbc_masjidalimran', 'UluPauh2023',
        'kptsspbc_masjidalimran2');*/

    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $show = mysqli_query($db, $query);
    $row = [];

    while ($rows = mysqli_fetch_assoc($show)) {
        $row[] = $rows;
    }
    return $row;
}

function cal_age($kp)
{
    $birth_year = substr($kp, 0, 2);
    $current_year = date('y');
    // Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
    $birth_year = ($birth_year > $current_year) ? (int)$birth_year + 1900 : (int)$birth_year + 2000;
    // Calculate the age
    return date('Y') - $birth_year;
}

$query2 = "";
$query3 = "";
if (isset($_POST['tapis'])) {
    $condition = $_POST['filter'];
    if ($condition == "fakir miskin") {
        $query2 = "SELECT * FROM kariah WHERE status = 'Disahkan' AND gaji = '<2500' OR gaji = 'bawah 2500' ";

    } elseif ($condition == "perempuan") {
        $query2 = "SELECT * FROM kariah WHERE status = 'Disahkan' AND SUBSTRING(ic, -1) % 2 = 0 ";
        $query3 = "SELECT  * FROM  tanggungan WHERE SUBSTRING(ic, -1) % 2 = 0";
    } elseif ($condition == "lelaki 15 tahun ke atas") {
        $query3 = "SELECT * FROM tanggungan";
    } elseif ($condition == "al-quran") {
        $query3 = "SELECT * FROM tanggungan WHERE pekerjaan LIKE '%Tahfiz%' OR pekerjaan LIKE '%Smka%' OR pekerjaan LIKE '%Agama%'";
    } elseif ($condition == "anak yatim") {
        $query3 = "SELECT * FROM tanggungan WHERE yatim ='Yes'";
    } elseif ($condition == "pencen dan penganggur") {
        $query2 = "SELECT * FROM kariah WHERE status = 'Disahkan' AND  kpekerjaan ='Pencen' OR kpekerjaan ='Tidak bekerja'";
        $query3 = "SELECT * FROM tanggungan WHERE pekerjaan ='Pencen' OR pekerjaan ='Tidak bekerja'OR pekerjaan ='Tiada'";
    } elseif ($condition == "rumah sendiri") {
        $query2 = "SELECT * FROM kariah WHERE  status = 'Disahkan' AND menghuni ='rsendiri' OR menghuni ='Rumah Sendiri'";
    } elseif ($condition == "rumah sewa") {
        $query2 = "SELECT * FROM kariah WHERE  status = 'Disahkan' AND menghuni ='rsewa' OR menghuni ='Rumah Sewa'";
    } elseif ($condition == "add&tel") {
        $query2 = "SELECT `Idkariah`, `nama`, `tel`, `alamat`, `ic` FROM kariah WHERE  status = 'Disahkan'";
    } else {
        ?>
        <script>
            document.location='Senarai_kariah.php';
        </script>
        <?Php
        exit();
    }
    $data_kariah = 0;
    $data_tanggung = 0;
    $data_kariah = 0;
    $data_tanggung = 0;
    if ($query2 != "")
        $data_kariah = display($query2);
    if ($query3 != "")
        $data_tanggung = display($query3);
    ?>
    <section class="content mb-3" style="margin-top:5%;">
    <br>
    <div class="container-fluid ">
    <div class="row">
    <div class="col-12 ">
        <h2 class="m-0">TAPISAN KARIAH DAN TANGGUNGAN</h2>
        <br>
        <div class="card shadow p-3 mb-5 bg-body rounded">
            <div class="card-header">
                <form method="post" action="" class="row mt-1">
                    <div class="row">
                        <div class="col-5">
                            <label for="filter"></label>
                            <select class="form-select" id="filter" name="filter">
                                <option value="semua" <?php if ($condition == 'semua')
                                    echo "selected"; ?>>
                                    SENARAI PENUH KARIAH
                                </option>
                                <option value="fakir miskin" <?php if ($condition == 'fakir miskin')
                                    echo "selected"; ?>>
                                    KARIAH FAKIR MISKIN
                                </option>
                                <option value="perempuan" <?php if ($condition == 'perempuan') echo
                                "selected"; ?>>
                                    KARIAH ATAU TANGGUNGAN WANITA
                                </option>
                                <option value="anak yatim" <?php if ($condition == 'anak yatim') echo
                                "selected"; ?>>
                                    KARIAH ATAU TANGGUNGAN ANAK YATIM
                                </option>
                                <option value="pencen dan penganggur"
                                    <?php if ($condition == 'pencen dan penganggur') echo "selected"; ?>>
                                    KARIAH ATAU TANGGUNGAN PENCEN
                                    DAN PENGANGGUR
                                </option>
                                <option value="rumah sendiri" <?php if ($condition == 'rumah sendiri')
                                    echo "selected"; ?>>
                                    KARIAH MENETAP RUMAH SENDIRI
                                </option>
                                <option value="rumah sewa" <?php if ($condition == 'rumah sewa')
                                    echo "selected"; ?>>
                                    KARIAH MENETAP RUMAH SEWA
                                </option>
                                <option value="add&tel" <?php if ($condition == 'add&tel')
                                    echo "selected"; ?>>
                                    ALAMAT DAN NO. TELEFON KARIAH
                                </option>
                                <option value="al-quran" <?php if ($condition == 'al-quran')
                                    echo "selected"; ?>>
                                    ANAK KARIAH YANG HAFAL AL-QURAN
                                </option>
                                <option value="lelaki 15 tahun ke atas"
                                    <?php if ($condition == 'lelaki 15 tahun ke atas') echo "selected"; ?>>
                                    ANAK KARIAH LELAKI 15 TAHUN
                                    KE ATAS
                                </option>
                            </select>
                        </div>
                        <div class="col-3 mt-4">
                            <button class="btn btn-secondary" style="width: 100px;height: 37px;"
                                    type="submit" name="tapis">
                                TAPIS
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <form method="post" action="excel_kariah_filter.php">
                    <input type="hidden" value="<?= $query2;?>" name="query2">
                    <input type="hidden" value="<?= $query3;?>" name="query3">
                    <input class="mt-3 float-right btn btn-success" name="export_filtered" value="Download Excel"
                           type="submit">
                </form>

            </div>
            <?php if ($data_kariah > 0) {
                ?>
                <h2 class="m-0">TAPISAN KARIAH</h2>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <?php
                        if ($condition != "add&tel") {
                            ?>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. KP</th>
                                <th>No. Tel</th>
                                <th>Butiran</th>
                            </tr>
                            <?php
                        } else {
                            ?>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>No. KP</th>
                                <th>No. Tel</th>
                                <th>Alamat</th>
                                <th>Butiran</th>
                            </tr>
                            <?php
                        } ?>
                        </thead>
                        <tbody>
                        <?php
                        $num = 1;
                        if ($condition != "add&tel") {
                            foreach ($data_kariah as $data) {
                                ?>
                                <tr>
                                    <td><?= $num++; ?></td>
                                    <td><?= strtoupper($data['nama']) ?></td>
                                    <td><?= $data['ic'] ?></td>
                                    <td><?= $data['tel'] ?></td>
                                    <td>
                                        <a class="btn btn-success"
                                           href="Maklumat_pemohon.php?id=<?= $data['Idkariah'] ?>"
                                           role="button">
                                            <i class="fas fa-address-card"></i>
                                            Butiran
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            foreach ($data_kariah as $data) {
                                ?>
                                <tr>
                                    <td><?= $num++; ?></td>
                                    <td><?= strtoupper($data['nama']) ?></td>
                                    <td><?= $data['ic'] ?></td>
                                    <td><?= $data['tel'] ?></td>
                                    <td><?= $data['alamat'] ?></td>
                                    <td>
                                        <a class="btn btn-success"
                                           href="Maklumat_pemohon.php?id=<?= $data['Idkariah'] ?>"
                                           role="button">
                                            <i class="fas fa-address-card"></i>
                                            Butiran
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
            <?php if ($data_tanggung > 0) {
                ?>
                <h2 class="m-0">TAPISAN TANGGUNGAN</h2>
                <div class="card-body">
                    <!-- <table id="example1" class="table table-bordered table-hover"> -->
                    <table class="table table-bordered table-striped data-table">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>UMUR</th>
                            <th>No. KP</th>
                            <th>Butiran Keluarga</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num = 1;
                        if ($condition != "lelaki 15 tahun ke atas") {
                            foreach ($data_tanggung as $data2) {
                                ?>
                                <tr>
                                    <td><?= $num++; ?></td>
                                    <td><?= strtoupper($data2['nama']) ?></td>
                                    <td><?= cal_age($data2['ic']); ?></td>
                                    <td><?= $data2['ic'] ?></td>
                                    <td>
                                        <a class="btn btn-success"
                                           href="Maklumat_pemohon.php?id=<?= $data2['kariah'] ?>"
                                           role="button">
                                            <i class="fas fa-address-card"></i>
                                            Butiran
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            foreach ($data_tanggung as $data2) {
                                $year = substr($data2['ic'], 0, 2);
                                $current = date('y');
                                $year = ($year > $current) ? (int)$year + 1900 : (int)$year + 2000;
                                $age = date('Y') - $year;
                                if ($age >= 15) {
                                    ?>
                                    <tr>
                                        <td><?= $num++; ?></td>
                                        <td><?= strtoupper($data2['nama']); ?></td>
                                        <td><?= cal_age($data2['ic']); ?></td>
                                        <td><?= $data2['ic']; ?></td>
                                        <td>
                                            <a class="btn btn-success"
                                               href="Maklumat_pemohon.php?id=<?= $data2['kariah'] ?>"
                                               role="button">
                                                <i class="fas fa-address-card"></i>
                                                Butiran
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
            } ?>
        </div>
    </div>
    <?php
} ?>
    </div>
    </div>
    </section>
<?php
include 'layout/footer.php';
