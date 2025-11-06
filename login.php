<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <center>
        <h1>Login</h1>
        <form action="" method="post">
            Username:
            <input type="text" name="user" id=""><br><br>
            Password:
            <input type="password" name="pass" id=""><br><br>
            <input type="submit" value="Login" name="login">
            <input type="reset" value="Reset">
        </form>
    </center>
</body>
</html>

<?php
if(isset($_POST["login"])) {
    $user = ($_POST["user"]);
    $pass = ($_POST["pass"]);

    if(empty($user) || empty($pass)) {
        echo "<center>Please enter both username and password.</center>";
    } else {
        $con = mysqli_connect('localhost', 'root', '', 'student');
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM login WHERE user='$user' AND pass='$pass'";
        $result = mysqli_query($con, $sql);

        if(!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        if(mysqli_num_rows($result) > 0) {
            echo "<script>window.location.href='home.php';</script>";
        } else {
            echo "<center><br>Invalid username or password.</center>";
        }

        mysqli_close($con);
    }
}
?>
