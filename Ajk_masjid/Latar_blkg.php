<?php
include 'layout/header.php';

if (isset($_POST['submit'])) {
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');
    $history = $_POST['history'];

    $query = "UPDATE `masjid` SET `latarbelakang`='$history' WHERE Idmasjid  = 1";

    mysqli_query($db, $query);
    echo "<script>
      alert('Anda Berjaya Update Data');
      document.location='Info_masjid.php';
      </script>";
    return mysqli_affected_rows($db);
} else {
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
}
?>
    <div class="container mt-5 offset-md-2" style="margin-top:5%;">
        <h1>Latar Belakang Masjid Ali-Imran</h1>
        <hr>

        <form action="" method="post">

            <div class="mb-3">
                <textarea name="history" id="history" cols="56" rows="15" required><?= $data['latarbelakang']; ?>
                </textarea>
            </div>

            <a class="btn btn-danger mb-3" onclick="return confirm('Anda pasti untuk batal?')"
               href="Info_masjid.php" role="button" style="float:left">
                Batal
            </a>

            <input name="submit" type="submit" class="btn btn-success" style="float: right;" value="Ubah">
        </form>
    </div>
<?php
include 'layout/footer.php';

