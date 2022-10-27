<!DOCTYPE html>
<html lang="en">

<head>
    <title>Popcorn Village Example2</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/layoutnavheadfoot.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- JS for carousel -->
    <script>
        var slidePosition = 1;
        var interval;
        var ms = 15 * 1000

        document.addEventListener("DOMContentLoaded", function(event) {
            SlideShow(slidePosition);

            // change slide every 15 sec
            interval = setInterval(MoveForward, ms);

            document.getElementById("forward").onclick = MoveForward;
            document.getElementById("back").onclick = MoveBack;
        });

        function SlideShow(n) {
            var slides = document.getElementsByClassName("slides-container");

            // wrap around for n more than max length
            if (n > slides.length)
                slidePosition = 1;

            // wrap around for negative n
            if (n < 1)
                slidePosition = slides.length;

            // set all invisible
            for (var i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }

            // enable display for selected slide
            slides[slidePosition - 1].style.display = "block";
        }

        function MoveForward() {
            clearInterval(interval);
            slidePosition += 1;
            SlideShow(slidePosition);
            interval = setInterval(MoveForward, ms);
        }

        function MoveBack() {
            clearInterval(interval);
            slidePosition -= 1;
            SlideShow(slidePosition);
            interval = setInterval(MoveForward, ms);
        }
    </script>
</head>

<body>
    <?php include "header.php"; ?>

    <!--contents-->
    <div id="contents">
        <div class="carousel">
            <!-- can use a loop here to make more entries -->
            <div class="slides-container">
                <img src="https://media.gv.com.sg/Booking/movies/images/load/bigimage/blackadam.jpg">
            </div>

            <div class="slides-container">
                <img src="https://movies.universalpictures.com/media/03-hwe-dm-mobile-banner-1080x745-pl-f01-082222-630665175d835-1.jpg">
            </div>

            <a class="back" id="back">&#10094;</a>
            <a class="forward" id="forward">&#10095;</a>
        </div>

        <div class="feature-wrapper">
            <h3 style="margin-left: 10px;"><b>Featured</b></h3>
            <div class="feature-flex-container">
                <!-- can use a loop here -->
                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://media.gv.com.sg/imagesresize/img3135.jpg">
                        <p>Title Name</p>
                    </a>
                </div>

                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://media.comicbook.com/2017/10/thor-movie-poster-marvel-cinematic-universe-1038890.jpg">
                        <p>Title Name</p>
                    </a>
                </div>

                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://images.nintendolife.com/d75c7f6b04a67/super-mario-bros-movie-everything-we-know.900x.jpg">
                        <p>Title Name</p>
                    </a>
                </div>

                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://movies.universalpictures.com/media/halloweenends-poster-560x880-6307e4fdcc4c1-1.jpg">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end of contents-->

    <?php include "footer.php"; ?>
</body>

</html>