<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Student Registration</h1>
    <form action="" method="post">
        Roll Number:
        <input type="number" name="roll" id=""><br><br>
        Name:
        <input type="text" name="name" id=""><br><br>
        Address:
        <textarea name="adrs" id=""></textarea><br><br>
        Phone Number:
        <input type="number" name="phone" id=""><br><br>
        Username:
        <input type="text" name="user" id=""><br><br>
        Password:
        <input type="password" name="pass" id=""><br><br>
        Retype Password:
        <input type="password" name="repass" id=""><br><br>
        <input type="submit" value="Register" name="regstr">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
<?php
if(isset($_POST["regstr"])){
    $roll = $_POST["roll"];
    $name = $_POST["name"];
    $adrs = $_POST["adrs"];
    $phone = $_POST["phone"];
    $user = $_POST["user"];
    $pass = $_POST["pass"];
    $repass = $_POST["repass"];

    if ($pass !== $repass) {
        die("<h3 style='color:red;'>Passwords do not match!</h3>");
    }

    $con = mysqli_connect('localhost', 'root', '', 'student');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO stud_det (rollno, name, address, phone, username, password)
            VALUES ($roll, '$name', '$adrs', '$phone', '$user', '$pass')";

    if (mysqli_query($con, $sql)) {
        echo "<h3 style='color:green;'>Registration successful!</h3>";
    } else {
        die("Error inserting student details: " . mysqli_error($con));
    }
}
?>
