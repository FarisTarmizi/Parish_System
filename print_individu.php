<?php
include 'layout/header_print.php';
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

function age($kp)
{
    $birth_year = substr($kp, 0, 2);
    $current_year = date('y');
    // Convert the two-digit year to a four-digit year (assuming a reasonable threshold, e.g., 80 years ago)
    $birth_year = ($birth_year > $current_year) ? (int)$birth_year + 1900 : (int)$birth_year + 2000;
    // Calculate the age
    return date('Y') - $birth_year;
}

$query = display("SELECT * FROM kariah WHERE Idkariah=$id")[0];
$tquery = display("SELECT * FROM tanggungan WHERE kariah=$id");
?>

<div class="container-fluid" style="margin-top:5%;">
    <div class="card">
        <div class="print-title text-center mb-5"></div>
        <div class="card-header text-center">
            <h1>
                Butiran Pemohon
            </h1>
        </div>
        <div class="card-body mt-5">
            <br>
            <div class="row">
                <div class="mb-3 col-3">
                    <label for="Nama" class="form-label">Nama Penuh</label>
                    <p><?= $query['nama'] ?></p>
                </div>
                <div class="mb-3 col-3">
                    <label for="tel" class="form-label">NO. TEL</label>
                    <p><?= $query['tel'] ?></p>
                </div>
            </div>

            <div class="mb-5 col-4">
                <label for="status" class="form-label">Status Kariah</label>
                <p>
                    <b><?php if ($query['status'] == "") {
                            echo 'Belum Disahkan';
                        } else {
                            echo $query['status'];
                        } ?></b>
                </p>
            </div>

        </div>
    </div>
</div>
<script>
    window.onload = function () {
        window.print();
    };
</script>
<?php include 'layout/footer2.php'; ?>
