<!DOCTYPE html>
<html lang="en">

<head>
    <title>Popcorn Village</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
        .container {
            display: flex;
            align-items: stretch;
        }

        body {
            margin: 0;
        }

        #navbar {
            float: left;
            width: 80px;
            /* height: 100vh; */
            background-color: #a19f9c;
            text-align: center;
        }

        nav {
            margin-top: 20px;
        }

        nav a {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 40px;
        }

        nav a p {
            margin: 0;
            font-size: 0.8em;
            color: #000000;
        }

        #rightcol {
            flex: 1;
        }

        #footflex {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            background-color: #696969;
            color: #ffffff;
        }

        .footercol {
            padding: 10px;
            text-align: center;
        }

        #headflex {
            display: flex;
            flex-wrap: nowrap;
            justify-content: space-between;
            background-color: #696969;
            color: #ffffff;
        }

        #headcol {
            flex-grow: 3;
            padding-left: 10px;
        }

        #headicons {
            flex-grow: 1;
            text-align: center;
        }

        #shortlogin {
            flex-grow: 1;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="navbar">
            <nav>
                <a href="index.html">
                    <i class="material-icons" style="font-size: 40px;">menu</i>
                </a>
                <a href="index.html">
                    <i class="material-icons" style="font-size: 40px;">home</i>
                    <p>Home</p>
                </a>
                <a href="index.html">
                    <i class="material-icons" style="font-size: 40px;">movie</i>
                    <p>Movies</p>
                </a>
                <a href="index.html">
                    <i class="material-icons" style="font-size: 40px;">view_timeline</i>
                    <p>Showtime</p>
                </a>
                <a href="index.html">
                    <i class="material-icons" style="font-size: 40px;">confirmation_number</i>
                    <p>Check Bookings</p>
                </a>
                <a href="index.html">
                    <i class="material-icons" style="font-size: 40px;">contact_mail</i>
                    <p>Contact Us</p>
                </a>
            </nav>
        </div>

        <div id="rightcol">
            <header>
                <div id="headflex">
                    <div id="headcol">
                        <h1>Popcorn Village</h1>
                    </div>
                    <div id="headicons">
                        <!-- <h4>cart and social</h4> -->
                        <a href="index.html" style="display: inline-block; margin: 20px 0;">
                            <i class="material-icons" style="font-size: 30px; color: #000000;">shopping_cart</i>
                        </a>
                    </div>
                    <div id="shortlogin">
                        <h4>login</h4>
                    </div>
                </div>
            </header>

            <!--contents-->
            <div id="content">