<!DOCTYPE html>
<html lang="en">

<head>
    <title>Popcorn Village Registration</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/layoutnavheadfoot.css">
    <link rel="stylesheet" href="css/loginoutregis.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Set handler for textboxes -->
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function(event) {
            var userbox = document.getElementById("username");
            var emailbox = document.getElementById("email");
            var pwbox = document.getElementById("password");
            var pw2box = document.getElementById("password2");
            userbox.onchange=chkusern;
            emailbox.onchange=chkemail;
            pwbox.onchange=chkpwd;
            //pwbox2.onchange=chkpwd2;
        });
        function chkusern(event) {
            var myUser = event.currentTarget;
            var userRegexp = /^(?=.{4,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/;
            //check name
            if (userRegexp.test(myUser.value) == true) {

            } else {
                alert("Unacceptable username");
            }
        }
        
        function chkemail(event) {
            var myEmail = event.currentTarget;
            var emailRegexp = /^[^@]+@localhost$/;
            //check name
            if (emailRegexp.test(myEmail.value) == true) {

            } else {
                alert("Unacceptable email");
            }
        }

        function chkpwd(event) {
            var myPw = event.currentTarget;
            var pwRegexp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
            //check name
            if (pwRegexp.test(myPw.value) == true) {

            } else {
                alert("Unacceptable password");
            }
        }
        function chkpwd2(event) {
            var myPw2 = event.currentTarget;
            var pw2Regexp = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
            //check name
            if (pw2Regexp.test(myPw2.value) == true) {

            } else {
                alert("Unacceptable password");
            }
        }
    </script>
</head>

<body>
    <?php include "header.php"; ?>

    <!--contents-->
    <div id="contents">
        <h2>Registration Page</h2>
        <form action="register.php" method=POST>
        Username: (4-20 char, number, alphabet, ., _)<br />
        <input type="text" id="username" name="username"><br /><br />
        Email:<br />
        <input type="text" id="email" name="email"><br /><br />
        Password: (at least 6 char, 1 number, 1 special, 1 upper 1 lower)<br />
        <input type="password" id="password" name="password"><br /><br />
        Password confirmation:<br /> 
        <input type="password" id="password2" name="password2"><br /><br />

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
        </form>
    </div>
    <!--end of contents-->

    <?php include "footer.php"; ?>
</body>

</html>