<?php
include 'layout/header2.php';
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

$data = display("SELECT * FROM masjid WHERE Idmasjid=1")[0];
?>
    <div class="content-wrapper  col-md-8 offset-md-2" style="margin-top:5%;">
        <section class="content md-3 ">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h1 class="mb-3">Latar Belakang Masjid</h1>
                    <h5><?= $data['latarbelakang']; ?></h5>
                </div>
                <div class="card-body"></div>
            </div>

            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h1 class="mb-3">Carta Organisasi Masjid Ali-Imran</h1>
                    <?php if (!empty($data['organisasi'])) { ?>
                        <img src="Ajk_masjid/upload/<?=$data['organisasi'];?>"
                             width="90%"
                             title="carta" alt="profile">
                    <?php } else { ?>
                        <h5>Tiada Rekod</h5>
                    <?php } ?>
                </div>
                <div class="card-body"></div>
            </div>

            <div class="card shadow p-3 mb-5 bg-body rounded">
                <div class="card-header">
                    <h1 class="mb-3">Pembangun Web</h1>
                </div>
                <div class="card-body ">
                    <h4 class="text-center"> Pelajar Dari Politeknik Tuanku Syed Sirajuddin</h4>
                    <table class="table table-bordered table-hover text-center ">
                        <tr>
                            <th><img src="assets_template/dist/img/ajim2.jpg" width="95px" alt="azim"></th>
                            <th><img src="assets_template/dist/img/wan.jpg " width="95px" alt="irfan"></th>
                            <th><img src="assets_template/dist/img/faris.jpg " width="95px" alt="faris"></th>
                        </tr>
                        <tr>
                            <td>MOHAMAD AZIM BIN ALANG AB.RAHMAN</td>
                            <td>WAN IRFAN BIN AZMI</td>
                            <td>MUHAMMAD FARIS BIN MOHD TARMIZI</td>
                        </tr>
                    </table>
                    <p class="float-right mt-3">Versi 1.0</p>
                </div>
            </div>    
        </section>
    </div>
<?php include 'layout/footer2.php' ?>