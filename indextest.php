<?php
include 'layout/header2.php';


?>
<head>
  <link rel="stylesheet" href="style.css">
</head>

<div style="margin-top:5%;">
    <!--         <div class="header">
            Masjid Ali-Imran Ulu Pauh
        </div> -->

    <div class="banner-container">
        <div id="bannerSlider" class="banner-slider">
            <img src="layout/masjid3copy.jpg" width="100%" height="400px">
        </div>
    </div>
</div>
<div class="content">
    <div class="head1">
        <h3>
            <strong>Sistem Pengurusan Maklumat Kariah Masjid Ali-Imran Ulu Pauh</strong>
        </h3>
        <p>Sistem pengurusan maklumat kariah di Masjid Ali-Imran bertujuan untuk menyediakan platform yang
            mudah
            digunakan
            bagi mengumpul, menyimpan, dan mengurus maklumat berkaitan ahli kariah, aktiviti, sumbangan, dan
            operasi
            harian
            masjid.</p>
        <p>Sistem ini membolehkan pihak masjid mengakses maklumat dengan cepat, menyokong proses pengambilan
            keputusan
            yang lebih efisien melalui analisis data yang tepat, dan menjadikan pengurusan kariah lebih
            teratur dan
            terkawal.</p>
        <p>Masjid Ali-Imran ingin menjemput semua tuan/puan yang bagi serta dalam komuniti Masjid Ali-Imran
            sebagai
            ahli
            kariah berdaftar. Tuan/Puan boleh mengakses pautan pendaftaran ahli kariah Masjid Ali-Imran di
            <a href="Borang.php">[klik disini]Pendaftaran Kariah</a>. Bagi semakkan status permohonan
            tuan/puan,
            sila
            layari pautan <a href="Semak_kariah.php">[klik disini]Semakan Kariah</a>. Daftar sekarang dan
            jadi
            sebahagian
            daripada komuniti yang berkembang di Masjid Ali-Imran.
        </p>


    </div>
    <div class="slideshow-container">
 
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>


</div>

<style>
    .containerr {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px;
    }

    .mapp {
        width: 100%;
        height: 300px;
        border: 0;
    }

    .textt {
        width: 100%;
        text-align: center;
        margin-top: 20px;
    }

    .hh3 {
        margin-bottom: 10px;
        /* Tambahkan margin bawah untuk memberikan ruang antara teks dan ikon */
    }

    .social-links {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-top: 10px;
        text-align: center;
    }

    .social-links a {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
        text-decoration: none;
        color: black;
    }

    .social-links img {
        width: 35px;
        height: 35px;
    }

    .social-links h6 {
        margin: 5px 0;
    }

    @media (min-width: 768px) {
        .containerr {
            flex-direction: row;
        }

        .textt {
            width: 60%;
            text-align: center;
            margin-top: 0;
        }

        .mapp {
            width: 45%;
            margin-left: 20px;
        }

        .social-links {
            flex-direction: row;
            justify-content: center;
        }

        .social-links a {
            margin-right: 20px;
            margin-bottom: 0;
        }
    }
</style>


<div class="custom-footer">
    <p class="lokasi">Lokasi Masjid Ali-Imran</p>
    <div class="containerr">
        <div class="textt">
            <h5 class="hh3">"Jarak kita dengan masjid tidak diukur dengan kaki,<br> tetapi dengan hati."</h5>
            <br><br><br>

            <h5>Info Lanjut
                <p>____________________</p>
            </h5>

            <div class="social-links">
                <a href="https://www.facebook.com/p/Masjid-Ali-Imran-Kg-Ulu-Pauh-100077880201389/" target="_blank">
                    <img src="layout/Facebook_Logo_(2019).png" alt="Facebook Icon">
                    <h6 style="color:white;">Masjid Ali-Imran Kg Ulu Pauh</h6>
                </a>
                &nbsp; &nbsp; &nbsp;
                <a href="https://wa.me/:+60175441454" target="_blank">
                    <img src="layout/whatsapp.png" alt="Whatsapp Icon">
                    <h6 style="color:white;">017 544 1454</h6>
                </a> &nbsp; &nbsp; &nbsp;
                <a href="mailto:Masjid.AliImran09@gmail.com">
                    <img src="layout/mailr.png" alt="Email Icon">
                    <h6 style="color:white;">Masjid.AliImran09@gmail.com</h6>
                </a>
            </div>


        </div>

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.271639926918!2d100.33165743857302!3d6.452626598384705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ca341f5f87a21%3A0x5e7f864eba2aeeaa!2sMasjid%20Kampung%20Ulu%20Pauh!5e0!3m2!1sen!2smy!4v1696431469948!5m2!1sen!2smy"
            class="mapp" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <!--     <div class="footer-links">
        <p class="footer-link">Penafian</p>
        <p class="footer-link">Hak Cipta</p>
        <p class="footer-link">Polisi Privasi</p>
        <p class="footer-link">Polisi Keselamatan</p>
    </div> -->
    <hr class="hr">
    <!-- <h5 class="h5">Info lanjut</h5> -->
    </a>
    <p>&copy; Masjid Ali-Imran. All rights reserved.</p>
</div>
</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<!-- DataTables  & Plugins -->
<script src="assets_template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets_template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets_template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets_template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets_template/plugins/jszip/jszip.min.js"></script>
<script src="assets_template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets_template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets_template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        /*         $('#senarai').DataTable({
                  "paging": true,
                  "lengthChange": false,
                  "searching": false,
                  "ordering": true,
                  "info": true,
                  "autoWidth": false,
                  "responsive": true,
                });  */
    });
</script>
<script>
    $(function () {
        $(".data-table").each(function () {
            $(this).DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["colvis"]
            }).buttons().container().appendTo($(this).parents('.card').find('.card-header .col-md-6:eq(0)'));
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    let slideIndex = 1;
    showSlides();

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides() {
        let i;
        const slides = document.getElementsByClassName("mySlides");

        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        if (slideIndex < 1) {
            slideIndex = slides.length;
        }

        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slides[slideIndex - 1].style.display = "block";

        slideIndex++; // Increment the slide index for the next iteration

        setTimeout(showSlides, 5000); // Call showSlides after 3000 milliseconds
    }
</script>