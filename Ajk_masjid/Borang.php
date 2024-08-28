<?php
include 'layout/header.php';

function display($query)
{
    $db = mysqli_connect(
        'localhost',
        'root',
        '',
        'masjid_ulu_pauh'
    );

    $show = mysqli_query($db, $query);
    $row = [];

    while ($rows = mysqli_fetch_assoc($show)) {
        $row[] = $rows;
    }
    return $row;
}

$bantuan = display("SELECT * FROM `jenis_bantuan`");
?>

<meta name="viewport" content="width=device-width, initial-scale=1">


<div class="container" style="margin-top:5%;">
    <h1>Borang Pendaftaran Kariah Masjid Ulu Pauh</h1>
    <hr>

    <form action="Confirm.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Penuh</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Penuh">
        </div>


        <div class="row">
            <div class="mb-3 col-md-3">
                <label for="tel" class="form-label">NO. TEL</label>
                <input type="tel" class="form-control" id="tel" name="tel" placeholder="+60">
            </div>

            <div class="mb-3 col-4">
                <label for="ic" class="form-label">NO. KP</label>
                <input type="text" class="form-control" id="ic" name="ic" placeholder="tanpa-" minlength="12"
                       maxlength="12" onkeyup="age();">
            </div>

            <div class="mb-3 col-2">
                <label for="umur" class="form-label">Umur</label>
                <input type="number" class="form-control" id="umur" name="umur" readonly>
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
            <textarea name="alamat" id="alamat" cols="50" rows="5"></textarea>
        </div>

        <div class="row">
            <div class="mb-3 col-md-2">
                <label for="Poskod" class="form-label">Poskod</label>
                <input type="text" class="form-control" id="Poskod" name="Poskod" placeholder="Poskod" value="02600"
                       readonly>
            </div>
            <div class="mb-3 col-md-2">
                <label for="Poskod" class="form-label">Negeri</label>
                <input type="text" class="form-control" id="Negeri" name="Negeri" placeholder="Negeri" value="Perlis"
                       readonly>
            </div>
        </div>


        <div class="mb-4 col-3">
            <label for="zon" class="form-label">Zon</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="zon">
                <option selected>Zon</option>
                <option value="Zon 001">Zon 001</option>
                <option value="Zon 002">Zon 002</option>
                <option value="Zon 003">Zon 003</option>
                <option value="Zon 004">Zon 004</option>
                <option value="Zon 005">Zon 005</option>
                <option value="Zon 006">Zon 006</option>
                <option value="Zon 007">Zon 007</option>
                <option value="Zon 008">Zon 008</option>
                <option value="Zon 009">Zon 009</option>
                <option value="Zon 010">Zon 010</option>
                <option value="Zon 011">Zon 011</option>
                <option value="Zon 012">Zon 012</option>
            </select>
        </div>


        <div class="mb-4 col-md-3">
            <label for="bangsa" class="form-label">Bangsa</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="bangsa">
                <option value="Bangsa" selected>Bangsa</option>
                <option value="Melayu">Melayu</option>
                <option value="Cina">Cina</option>
                <option value="India">India</option>
                <option value="Lain-lain">Lain-lain</option>
            </select>
        </div>



        <div class="col-20 mb-4">
            <div>
                <label for="oku" class="form-label">Keadaan Fizikal</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="oku" id="oku" value="oku" onclick="enableInput()">
                <label class="form-check-label" for="oku">OKU</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="oku" id="tidak" value="tidak" checked
                       onclick="disableInput()">
                <label class="form-check-label" for="tidak">Tidak berkaitan</label>
            </div>

            <div class="col-md-3 col-12">
                <label for="joku" class="form-label">Nyatakan jenis kecacatan</label>
                <input type="text" class="form-control" id="joku" name="joku" disabled>
            </div>

        </div>

        <script>
            function enableInput() {
                var jokuInput = document.getElementById("joku");
                jokuInput.disabled = false;
            }

            function disableInput() {
                var jokuInput = document.getElementById("joku");
                jokuInput.disabled = true;
            }

            // Call disableInput on page load to set initial state
            disableInput();
        </script>



        <div>
            <label for="OKU" class="form-label">Kad OKU</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="kadoku" id="kadoku" value="OKU">
            <label class="form-check-label" for="OKU">Ada</label>
        </div>
        <div class="form-check form-check-inline mb-4">
            <input class="form-check-input" type="radio" name="kadoku" id="kadoku" value="tiada" checked>
            <label class="form-check-label" for="tiada">Tiada</label>
        </div>

        <div class="mb-4">
            <div>
                <label for="perkahwinan" class="form-label">Status perkahwinan</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="Bujang" value="Bujang">
                <label class="form-check-label" for="Bujang">Bujang</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="Kahwin" value="Kahwin" checked>
                <label class="form-check-label" for="Kahwin">Kahwin</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="Janda" value="Janda">
                <label class="form-check-label" for="Janda">Janda</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="Duda" value="Duda">
                <label class="form-check-label" for="Duda">Duda</label>
            </div>
        </div>

        <div class="mb-4">
            <div>
                <label for="menghuni" class="form-label">Menghuni</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="menghuni" id="rsendiri" value="rsendiri" checked>
                <label class="form-check-label" for="rsendiri">Rumah Sendiri</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="menghuni" id="rsewa" value="rsewa">
                <label class="form-check-label" for="rsewa">Rumah Sewa</label>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6 col-12 mt-4">
                <label for="Pekerjaan" class="form-label">Pekerjaan</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="kpekerjaan">
                    <option selected>Pilih kategori pekerjaan</option>
                    <option value="Kerajaan">Kerajaan</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Sendiri">Sendiri</option>
                    <option value="Pencen">Pencen</option>
                    <option value="Tidak bekerja">Tidak bekerja</option>
                </select>
                <label for="pekerjaan" class="form-label">Nyatakan jenis pekerjaan</label>
                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
            </div>


            <div class="col-md-6 col-12 mt-4">
                <label for="gaji" class="form-label col-0">PENDAPATAN SEISI RUMAH</label>
                <select class="form-select" aria-label="Default select example" name="gaji">
                    <option selected>Julat Gaji</option>
                    <option value="<2500"> kurang 2,500</option>
                    <option value="2501-3170">2,501-3,170</option>
                    <option value="3171-4850">3,171-4,850</option>
                    <option value="4851-7100">4,851-7,100</option>
                    <option value="7101-10970">7,101-10,970</option>
                    <option value="10971-15040">10,971-15,040</option>
                    <option value=">15051">lebih 15,051</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <label for="namawaris" class="form-label">Nama Suami/Isteri/Penjaga</label>
            <input type="text" class="form-control" id="namawaris" name="namawaris"
                   placeholder="Jika berkaitan">
        </div>
        <div class="mb-3 col-4">
            <label for="icwaris" class="form-label">NO. KP Suami/Isteri/Penjaga</label>
            <input type="text" class="form-control" id="icwaris" name="icwaris" placeholder="tanpa-" minlength="12" maxlength="12">
        </div>


        <div class="row">
            <div class="col-md-6 col-12 mt-4">
                <label for="kpekerjaanwaris" class="form-label">Kategori pekerjaan Suami/Isteri/Penjaga</label>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="kpekerjaanwaris">
                    <option value="tiada" selected>Pilih kategori pekerjaan</option>
                    <option value="Kerajaan">Kerajaan</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Sendiri">Sendiri</option>
                    <option value="Pencen">Pencen</option>
                    <option value="Tidak bekerja">Tidak bekerja</option>
                </select>
            </div>


            <div class="col-md-6 col-12 mt-4">
                <label for="pekerjaanwaris" class="form-label">Nyatakan jenis pekerjaan Suami/Isteri/Penjaga</label>
                <input type="text" class="form-control" id="pekerjaanwaris" name="pekerjaanwaris" placeholder="Jika berkaitan">
            </div>
        </div>


        <div>
            <label for="bantuan" class="form-label">Jenis bantuan yang pernah diterima:</label>
        </div>
        <div class="mb-4">
            <select class="form-select" aria-label="Default select example" name="bantuan">
                <option value="" selected>SKIM BANTUAN ZAKAT</option>
                <option value="Tidak Terima">Tidak Terima</option>
                <?php
                foreach ($bantuan as $item) {
                    ?>
                    <option value="<?= $item['nama']; ?>">
                        <?= $item['nama']; ?>
                    </option>
                <?php } ?>
            </select><br>
            <label for="lain" class="form-label">Nyatakan jika lain-lain bantuan:</label>
            <input type="text" class="form-control col-4 mb-4" id="lain" name="lain" placeholder="Jika berkaitan">
        </div>


        <div>
            <label for="tanggungan" class="form-label">Tanggungan Pemohon:</label>
        </div>


        <label for="sendiri" class="form-label">Ahli Keluarga Dibawah Tanggungan

        </label>

        <!-- Table with five header columns and one editable row -->
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
        </table>
        <a class="btn btn-primary" onclick="addRow()">Tambah Tanggungan</a>

        <script>
            let rowCount = 1; // Initialize the row count

            function addRow() {
                // Reference to the table
                let table = document.getElementById("userTable");

                // Create a new row
                let newRow = table.insertRow(-1); // -1 inserts a new row at the last position

                // Create cells with contenteditable attribute
                let countCell = newRow.insertCell(0);
                countCell.innerHTML = rowCount++; // Increment the row count and display it

                let nameCell = newRow.insertCell(1);
                nameCell.contentEditable = true;
                nameCell.innerHTML = `<input type="text" name="namat${rowCount - 2}">`;

                let icCell = newRow.insertCell(2);
                icCell.contentEditable = true;
                icCell.innerHTML = `<input type="text" name="hubungant${rowCount - 2}">`;

                let ageCell = newRow.insertCell(3);
                ageCell.contentEditable = true; // Set contentEditable using JavaScript
                let uniqueIdAge = `ict_${rowCount - 2}`;
                ageCell.innerHTML = `<input type="text" id="${uniqueIdAge}" onkeyup="age2('${uniqueIdAge}');" minlength="12" maxlength="12" name="ict${rowCount - 2}">`;

                let locationCell = newRow.insertCell(4);
                locationCell.contentEditable = true;
                let uniqueIdLocation = `umurt_${rowCount - 2}`;
                locationCell.innerHTML = `<input type="number" id="${uniqueIdLocation}" readonly name="umurt${rowCount - 2}">`;

                let emailCell = newRow.insertCell(5);
                emailCell.contentEditable = true;
                emailCell.innerHTML = `<input type="text" name="sekolaht${rowCount - 2}">`;

                let okuCell = newRow.insertCell(6);
                okuCell.innerHTML = `<input type="checkbox" name="okut${rowCount - 2}" value="Yes">`;

                let kadCell = newRow.insertCell(7);
                kadCell.innerHTML = `<input type="checkbox" name="kadt${rowCount - 2}" value="Yes">`;

                let anakCell = newRow.insertCell(8);
                anakCell.innerHTML = `<input type="checkbox" name="anakt${rowCount - 2}" value="Yes">`;

                // Update the hidden rowCountField with the new value of rowCount
                document.getElementById("rowCountField").value = rowCount;
            }

            function age2(uniqueId) {
                // Assuming you have the 'id' variable containing the date in the format 'ddmmyyhhmmss'
                var id = document.getElementById(uniqueId).value;

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
        <input type="hidden" id="rowCountField" name="rowCount" value="1">
        <button type="submit" name="submit" value="SUBMIT" class="mb-5 btn btn-primary btn-lg "
                style="float: right;">Daftar
        </button>
    </form>
</div>

<?php
include 'layout/footer.php'; ?>


