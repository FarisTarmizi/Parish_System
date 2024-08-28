<?php
include 'header_nopreload.php';
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

$data_kariah = display("SELECT * FROM kariah WHERE status = 'Disahkan' ORDER BY Idkariah DESC");
?>

    <section class="content mb-3">
        <br>
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12 ">
                    <h2 class="m-0">SENARAI PENUH KARIAH</h2>
                    <br>
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-header">
                            <form method="post" action="filter_senarai_kariah.php" class="row mt-1">
                                <div class="row">
                                    <div class="col-5">
                                        <label for="filter"></label>
                                        <select class="form-select" id="filter" name="filter">
                                            <option value="semua" selected>
                                                SENARAI PENUH KARIAH
                                            </option>
                                            <option value="fakir miskin">
                                                KARIAH FAKIR MISKIN
                                            </option>
                                            <option value="perempuan">
                                                KARIAH ATAU TANGGUNGAN WANITA
                                            </option>
                                            <option value="anak yatim">
                                                KARIAH ATAU TANGGUNGAN ANAK YATIM
                                            </option>
                                            <option value="pencen dan penganggur">
                                                KARIAH ATAU TANGGUNGAN PENCEN
                                                DAN PENGANGGUR
                                            </option>
                                            <option value="rumah sendiri">
                                                KARIAH MENETAP RUMAH SENDIRI
                                            </option>
                                            <option value="rumah sewa">
                                                KARIAH MENETAP RUMAH SEWA
                                            </option>
                                            <option value="add&tel">
                                                ALAMAT DAN NO. TELEFON KARIAH
                                            </option>
                                            <option value="al-quran">
                                                ANAK KARIAH YANG HAFAL AL-QURAN
                                            </option>
                                            <option value="lelaki 15 tahun ke atas">
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

                            <form method="post" action="excel.php">
                                <input class="mt-3 float-right btn btn-success" type="submit" name="export_semua"
                                       role="button" value="Download Excel">
                            </form>
                        </div>
                        <div class="card-body">
                            <!-- <table id="example1" class="table table-bordered table-hover"> -->
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>NO.</th>
                                    <th>NAMA</th>
                                    <th>NO. KP</th>
                                    <th>NO. Tel</th>
                                    <th>BUTIRAN</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $num = 1;
                                foreach ($data_kariah as $data):
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
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include 'footer.php';
?>