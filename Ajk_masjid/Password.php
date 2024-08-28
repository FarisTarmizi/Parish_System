<?php
include 'layout/header_nopreload.php';
function resetpass($post)
{
    $db = mysqli_connect('localhost', 'root', '',
        'masjid_ulu_pauh');

    $old = $post['pass1'];
    $new = $post['pass2'];
    $confirm = $post['pass3'];
    $result=0;
    $show = mysqli_query($db, "SELECT * FROM ajk WHERE Idajk=1");
    $row = mysqli_fetch_assoc($show);
    $pass = $row['password'];
    if ((!empty($old) && !empty($new) && !empty($confirm)) && ($confirm == $new)&&($old == $pass) ) {
            $query = "UPDATE `ajk` SET `password`='$new' WHERE  Idajk  = 1";
            $exe = mysqli_query($db, $query);

            if ($exe) {
                $result= mysqli_affected_rows($db);
            } else {
                $result= false;
            }
    }
    return $result;
}

if (isset($_POST['ubah'])) {
    if (resetpass($_POST) > 0) {
        echo "<script>
        alert('Anda Berjaya Ubah Kata Laluan. Sila Log Masuk Semula');
        document.location='../login.php';
        </script>";
    } else {
        echo "<script>
      alert('Anda Gagal UbahKata Laluan');
      document.location='index.php';
      </script>";
    }
}
?>
    <section class="content mb-3">
        <br>
        <div class="container-fluid ">
            <div class="col-8 text-center" style="left:17%;margin-top:5%;">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="card-header">
                        <h2>UBAH KATA LALUAN</h2>
                    </div>
                    <div class="card-body">
                        <form action="" method="post">

                            <div class="mb-3">
                                <label for="pass1">Kata Laluan Sekarang:</label>
                                <input type="password" id="pass1" name="pass1"><br>
                            </div>

                            <div class="mb-3">
                                <label for="pass2">Kata Laluan Baru:</label>
                                <input type="password" id="pass2" name="pass2"><br>
                            </div>

                            <div class="mb-3"><label for="pass3">Sahkan Kata Laluan:</label>
                                <input type="password" id="pass3" name="pass3"><br>
                            </div>

                            <input name="ubah" type="submit" value="Ubah" class="btn btn-primary" role="button">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include 'layout/footer2.php'; ?>