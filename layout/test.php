<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS for the banner container */
        .slideshow-container {
            position: relative;
            margin: auto;
        }

        /* CSS for the individual slides */
        .mySlides {
            display: none;
        }

        /* CSS for the navigation arrows */
        .prev, .next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px;
            cursor: pointer;
        }

        .prev {
            left: 0;
        }

        .next {
            right: 0;
        }
    </style>
</head>
<body>
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="madina.jpg" width="70%" height="10%" >
        </div>

        <div class="mySlides">
            <img src="backgroud.jpg" width="70%" height="10%" >
        </div>

        <div class="mySlides">
            <img src="madina.jpg" width="70%" height="10%" >
        </div>
    </div>

    <!-- Navigation arrows outside the slideshow container -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            if (n > slides.length) {
                slideIndex = 1;
            }
            if (n < 1) {
                slideIndex = slides.length;
            }

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            slides[slideIndex - 1].style.display = "block";
        }

        // Automatic slideshow with a 3-second interval
        var autoSlideIndex = 0;
        autoShowSlides();

        function autoShowSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");

            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            autoSlideIndex++;
            if (autoSlideIndex > slides.length) {
                autoSlideIndex = 1;
            }

            slides[autoSlideIndex - 1].style.display = "block";
            setTimeout(autoShowSlides, 3000); // Change slide every 3 seconds
        }
    </script>
</body>
</html>
