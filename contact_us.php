<!DOCTYPE html>
<html lang="en">

<head>
    <title>Popcorn Village Example2</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/layoutnavheadfoot.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        table {
            border-spacing: 0px;
        }

        th {
            width: 20%;
            text-align: left;
            padding: 10px;
        }

        td {
            padding: 10px;
        }

        thead {
            background-color: #d3d3d3;
        }
    </style>
</head>

<body>
    <?php include "header.php"; ?>

    <div id="contents">
        <table border="1" style="margin: 30px auto; width: 80%; min-width: 800px;">
            <caption style="font-size:1.2em; text-align: left;"><b>Contact Us</b></caption>
            <thead>
                <tr>
                    <th colspan="2">Popcorn Village</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Address:</th>
                    <td>
                        123 ABC Road #00-123 <br>
                        XXX Mall <br>
                        Singapore 123456 <br>
                        (West block, Level 3) <br>
                    </td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td>
                        <a href="mailto:xxx@yyy.com">xxx@yyy.com</a>
                    </td>
                </tr>

                <tr>
                    <th>Phone Number:</th>
                    <td>
                        8888 9999
                    </td>
                </tr>

                <tr>
                    <th>Operating Hours:</th>
                    <td>
                        Weekdays: <br>
                        10:10am - 00:00am <br><br>
                        Weekends: <br>
                        10:00am - 02:00am <br><br>
                        Public holidays: <br>
                        10:00am - 03:00am
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php include "footer.php"; ?>
</body>

</html>