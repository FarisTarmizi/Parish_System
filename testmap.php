<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        .map {
            width: 100%;
            height: 300px;
            border: 0;
        }

        .text {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .h3 {
            margin-bottom: 10px; /* Tambahkan margin bawah untuk memberikan ruang antara teks dan ikon */
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
            .container {
                flex-direction: row;
            }

            .text {
                width: 60%;
                text-align: center;
                margin-top: 0;
            }

            .map {
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
</head>

<body>

    <div class="container">
        <div class="text">
            <h3 class="h3">"Jarak kita dengan masjid tidak diukur dengan kaki,<br> tetapi dengan hati."</h3>

            <div class="social-links">
                <a href="https://www.facebook.com/p/Masjid-Ali-Imran-Kg-Ulu-Pauh-100077880201389/" target="_blank">
                    <img src="layout/Facebook_Logo_(2019).png" alt="Facebook Icon">
                    <h6>Masjid Ali-Imran Kg Ulu Pauh</h6>
                </a>

                <a href="mailto:Masjid.AliImran09@gmail.com">
                    <img src="layout/mailr.png" alt="Email Icon">
                    <h6>Masjid.AliImran09@gmail.com</h6>
                </a>
            </div>
        </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1982.271639926918!2d100.33165743857302!3d6.452626598384705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ca341f5f87a21%3A0x5e7f864eba2aeeaa!2sMasjid%20Kampung%20Ulu%20Pauh!5e0!3m2!1sen!2smy!4v1696431469948!5m2!1sen!2smy"
            class="map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

</body>

</html>
