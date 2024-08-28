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

$data_kariah = display("SELECT * FROM kariah");
?>

<section class="content" style="margin-top:5%;">
    <br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-10 offset-md-1">
                <br><h1 class="text-center"><b style="font-family: 'Times New Roman',serif;">Senarai Kariah Masjid Ali-Imran</b></h1><br>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header">
                        <h3 class="card-title">Senarai Penuh Kariah Muslimin</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover data-table">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 1;
                            foreach ($data_kariah as $data) {
                                $sex = substr($data['ic'], 11, 1);
                                $gender = "Lelaki";
                                if ($sex % 2 == 0) {
                                    $gender = "Perempuan";
                                }
                                if ($gender == "Lelaki") {
                                    ?>
                                    <tr>
                                        <td><?= $num++; ?></td>
                                        <td><?= $data['nama'] ?></td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card shadow p-3 mb-5 bg-body rounded">
                    <div class="card-header">
                        <h3 class="card-title">Senarai Penuh Kariah Muslimat</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered table-hover data-table ">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $num = 1;
                            foreach ($data_kariah as $data) {
                                $sex = substr($data['ic'], 11, 1);
                                $gender = "Lelaki";
                                if ($sex % 2 == 0) {
                                    $gender = "Perempuan";
                                }
                                if ($gender == "Perempuan") {
                                    ?>
                                    <tr>
                                        <td><?= $num++; ?></td>
                                        <td><?= $data['nama'] ?></td>
                                    </tr>
                                <?php }
                            } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <div class="container mt-3">
  <a class="btn btn-primary " href="Borang.php" role="button">Tambah</a>
  <a class="btn btn-secondary " href="#" role="button" onclick="return alert('Belum ada fungsi cetak lagi.')">Cetak</a> <br><br>
  <table class="table table-striped table-hover table-bordered">
    <thead>
      <tr>
        <th>No.</th>
        <th>Nama</th>
        <th>No. KP</th>
        <th>No. Tel</th>
        <th>Status</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     --><?php //
//        $num=1;
//        foreach($data_kariah  as $data):
//      ?>
      <!--<tr>
        <td><?php /*= $num++;*/?></td>
        <td><?php /*= $data['Nama']*/?></td>
        <td><?php /*= $data['Kp']*/?></td>
        <td>0<?php /*= $data['Tel']*/?></td>
        <td><?php /*= $data['Status']*/?></td>
        <td><a class="btn btn-success" href="Maklumat_pemohon.php?id=<?php /*=$data['Id']*/?>" role="button">Butiran</a></td>
        <td><a class="btn btn-primary" href="Edit_data.php?id=<?php /*=$data['Id']*/?>" role="button">Ubah</a></td>
      </tr>
      --><?php /*endforeach;*/?>
<?php include 'layout/footer3.php';?>
