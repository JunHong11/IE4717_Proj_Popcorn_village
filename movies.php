<!DOCTYPE html>
<html lang="en">

<head>
    <title>Movies</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/layoutnavheadfoot.css">
    <link rel="stylesheet" href="css/movies.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
    <?php include "header.php"; ?>

    <!--contents-->
    <div id="contents">
        <div class="content-wrapper">
            <div class="feature-flex-container">
                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://m.media-amazon.com/images/M/MV5BZWMyYzFjYTYtNTRjYi00OGExLWE2YzgtOGRmYjAxZTU3NzBiXkEyXkFqcGdeQXVyMzQ0MzA0NTM@._V1_FMjpg_UX1000_.jpg">
                        <p>Spider-Man: No way Home</p>
                    </a>
                </div>

                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://www.posterhub.com.sg/images/detailed/129/111834_Top_Gun_Maverick_Final.jpeg">
                        <p>Top Gun: Maverick</p>
                    </a>
                </div>

                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://images.nintendolife.com/d75c7f6b04a67/super-mario-bros-movie-everything-we-know.900x.jpg">
                        <p>Title Name</p>
                    </a>
                </div>
                <!--insert query to database here-->
                <!--replace variables wif those from query to display for after query-->
                <?php
                for ($i = 0; $i < 3; $i++) {
                    echo '
                    <div class="feature-flex-item">
                        <a href="">
                            <img src="https://st.depositphotos.com/1144687/2205/i/950/depositphotos_22055483-stock-photo-blank-poster.jpg">
                            <p>Sample</p>
                        </a>
                    </div>
                         ';
                }
                ?>
                <!--end of loop-->
                <div class="feature-flex-item">
                    <a href="">
                        <img src="https://st.depositphotos.com/1144687/2205/i/950/depositphotos_22055483-stock-photo-blank-poster.jpg">
                        <p>Sample</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--end of contents-->

    <?php include "footer.php"; ?>
</body>

</html>