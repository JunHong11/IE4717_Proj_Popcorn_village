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

    // to change, $cart = $_SESSION['cart'], then remove the 3 lines below
    $cart = array();
    $cart[] = array("selected-seats" => "A1 A5 G14 ", "stid_selected" => 210101);
    $cart[] = array("selected-seats" => "A1 B5 F14 ", "stid_selected" => 210103);
    $cart[] = array("selected-seats" => "B2 C5 E14 ", "stid_selected" => 210110);
    // just change the value, not the keys
    $cart[] = array("email" => "ntu@edu.sg", "custname" => "Marcus", "username" => "marc55", "total" => 100);

    // query for mid, dayofweek, timeslot using stid
    for ($i = 0; $i < count($cart) - 1; $i++) {
        $query = 'SELECT * FROM showtimes WHERE stid="' . $cart[$i]["stid_selected"] . '";';

        $result = $db->query($query);
        //$result_num_rows = $result->num_rows;
        $row = $result->fetch_assoc();

        //print_r($row);
        $cart[$i]["mid"] = $row["mid"];
        $cart[$i]["dayofweek"] = $row["dayofweek"];
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
        foreach (explode(" ", trim($item["selected-seats"])) as $seat_num) {
            $query = $query . 'INSERT INTO purchases VALUES (NULL, ' . $rid . ', ' . $item['mid'] . ', "' . $seat_num . '", "' . $item['dayofweek'] . '", "' . $item['timeslot'] . '");';
        }
    }
    $db->multi_query($query);

    //print_r($cart);
    $result->free();
    $db->close();
    ?>

    <div id="contents">
        <h3>TEST CONTENT</h3>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>