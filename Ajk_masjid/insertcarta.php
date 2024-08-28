<?php
include 'layout/header.php';

?>
    <div class="container mt-5 offset-md-2" style="margin-top:5%;">
        <h1>Carta Organisasi Masjid Ali-Imran</h1>
        <hr>

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="carta">Masukkan Gambar:</label>
                <input type="file" id="carta" name="carta"><br>
            </div>

            <input name="submit" type="submit" value="Insert">
        </form>
    </div>
<?php
include 'layout/footer.php';
?>