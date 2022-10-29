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
            <?php
            include "dbconnect.php";
            $featurelist = array('2101','2202','2104','2001');
            if (isset($_SESSION['valid_user'])) {
                $userid = $_SESSION['valid_user'];
                //get featured since login
                //fetch featured for that user
                $fetchq = 'SELECT featured FROM users WHERE username="'.$userid.'";';
                $result = $db->query($fetchq);
                $row = $result->fetch_assoc();
                //customised featured if avail
                if (!empty($row["featured"])) {
                    //convert string to array
                    $featurelist = explode(",", $row["featured"]);
                }
            }
            ?>
            <!-- used for passing the movie id to the movie details page -->
            <form id="movie_selection_form" method="post" action="movie_details.php">
                <input type="text" id="movieid_selected" name="movieid_selected" value="" hidden>
                <div class="feature-flex-container">
                    <!-- query and display featured movies -->
                    <?php
                    for ($i = 0; $i < (sizeof($featurelist)); $i++) {
                        $query = 'SELECT mid, thumbnail, title FROM movies WHERE mid='.$featurelist[$i].';';
                        $result = $db->query($query);
                        $row = $result->fetch_assoc();
                        echo '<div class="feature-flex-item">
                            <a href="#" class="movie_select_btn" data-movieid="' . $row["mid"] . '">
                            <img src="' . $row["thumbnail"] . '">
                            <p>' . $row["title"] . '</p>
                            </a>
                         </div>';
                    }
                    ?>
                </div>
            </form>
        </div>
        <!-- Set handler for anchor onclick -->
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function(event) {
                var movieitems = document.getElementsByClassName("movie_select_btn");

                for (var i = 0; i < movieitems.length; i++) {
                    movieitems[i].onclick = function() {
                        //alert(this.dataset.movieid);
                        document.getElementById("movieid_selected").value = this.dataset.movieid;
                        document.getElementById("movie_selection_form").submit();
                        //alert(document.getElementById("movieid_selected").value);
                    }
                }
            });
        </script>
    </div>
    <!--end of contents-->

    <?php include "footer.php"; ?>
</body>

</html>