<?php include 'layout/header2.php';

?>

    <div class="container" style="margin-top:5%;">
        <h1 class="text-center">Semakan Pendaftaran Kariah Masjid Ulu Pauh</h1>
        <hr>
        <form action="Maklumat_pemohon.php" method="post" class="text-center mt-5" target="_blank">
            <div class="mb-4 col-8  offset-md-2">
                <label class="form-label" for="Kp">NO. KP</label>
                <input type="text" class="form-control" name="Kp" id="Kp" placeholder="tanpa '-' " required>
            </div>
            <input type="submit" name="semak" class="btn btn-primary mb-5" value="Semak">
        </form>
    </div>

<?php include 'layout/footer2.php'; ?>