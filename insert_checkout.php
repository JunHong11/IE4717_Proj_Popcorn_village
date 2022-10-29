<!DOCTYPE html>
<html lang="en">

<head>
    <title>Popcorn Village Example2</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/layoutnavheadfoot.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <?php include "header.php"; ?>
    <?php
    include "dbconnect.php";

    $dayarr = array('Mon'=>0,'Tues'=>1, 'Wed'=>2, 'Thu'=>3, 'Fri'=>4, 'Sat'=>5, 'Sun'=>6);

    // to change, $cart = $_SESSION['cart'], then remove the 3 lines below
    $cart = $_SESSION['cart'];
    /*$cart = array();
    $cart[] = array("selected-seats" => "A1 A5 G14 ", "stid_selected" => 210101);
    $cart[] = array("selected-seats" => "A1 B5 F14 ", "stid_selected" => 210103);
    $cart[] = array("selected-seats" => "B2 C5 E14 ", "stid_selected" => 210110);*/
    // just change the value, not the keys
    $cart[] = array("email" => $_POST["email"], "custname" => $_POST["custname"], "username" => $_POST["username"], "total" => $_POST["total"]);

    // query for mid, dayofweek, timeslot using stid
    for ($i = 0; $i < count($cart) - 1; $i++) {
        $query = 'SELECT * FROM showtimes WHERE stid="' . $cart[$i]["stid_selected"] . '";';

        $result = $db->query($query);
        //$result_num_rows = $result->num_rows;
        $row = $result->fetch_assoc();

        //print_r($row);
        $cart[$i]["mid"] = $row["mid"];
        //this day of week need change
        //$cart[$i]["dayofweek"] = $row["dayofweek"];
        $today = new DateTime(); //todays date 
        $todayshort= $today->format('D'); //todays day(short) 
        $targetday = $row["dayofweek"];
        if ($dayarr[$targetday] >= $dayarr[$todayshort]) {
            $daysdiff = $dayarr[$targetday] - $dayarr[$todayshort];
        } else {
            $diff = $dayarr[$todayshort] - $dayarr[$targetday];
            $daysdiff = 6 - $dayarr[$todayshort] + $dayarr[$targetday] + 1;
        }
        $increasedays = '+'.$daysdiff.' days';
        $today->modify($increasedays);
        $cart[$i]["mdate"] = $today->format('Y-m-d');
        $cart[$i]["timeslot"] = $row["timeslot"];
    }

    // query for max rid value
    $query = 'SELECT rid FROM customers ORDER BY rid DESC LIMIT 1';
    $result = $db->query($query);
    $row = $result->fetch_assoc();
    $rid = $row["rid"] + 1;

    // insert into customers table
    $customer_info = array_pop($cart);
    $query = 'INSERT INTO customers VALUES (' . $rid . ', "' . $customer_info["email"] . '", "'
        . $customer_info["custname"] . '", "' . $customer_info["username"] . '", ' . $customer_info["total"] . ');';
    $db->query($query);

    // insert into purchases table
    $query = "";
    foreach ($cart as $item) {
        foreach (explode(" ", $item["selected-seats"]) as $seat_num) {
            $query = $query . 'INSERT INTO purchases VALUES ("", ' . $rid . ', ' . $item['mid'] . ', "' . $seat_num . '", "' . $item['mdate'] . '", "' . $item['timeslot'] . '");';
        }
    }
    $db->multi_query($query);
    while ($db->next_result());

    //update showtimes with taken seats
    $query = "";
    foreach ($cart as $item) {
        $query = $query.'UPDATE showtimes SET takenseats=CONCAT(takenseats, " '.$item["selected-seats"].'") WHERE stid='.$item["stid_selected"].';';
    }
    $db->multi_query($query);
    while ($db->next_result());


    //print_r($cart);
    $result->free();
    $db->close();

     // unset and redirects
     unset($_SESSION['cart']);;
     echo '<script>
     document.addEventListener("DOMContentLoaded", function(event) {
         if (confirm("Tickets Purchased! Go to check bookings?")) {
             window.location.replace("check_bookings.php");
           } else {
             window.location.replace("index.php");
           }
    });
    </script>';
    ?>

    <div id="contents">
    </div>

    <?php include "footer.php"; ?>
</body>

</html>