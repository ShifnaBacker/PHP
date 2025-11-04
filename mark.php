<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["roll"]) && !isset($_POST["submit_mark"])) {

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

    echo "
    <h1>Mark Entry</h1>
    <form action='mark.php' method='post'>
        <input type='hidden' name='roll' value='$roll'>
        Roll Number: $roll <br><br>
        Mark 1: <input type='number' name='mark1' required><br><br>
        Mark 2: <input type='number' name='mark2' required><br><br>
        Mark 3: <input type='number' name='mark3' required><br><br>
        <input type='submit' name='submit_mark' value='Submit Marks'>
    </form>";
}
?>
<?php
if (isset($_POST["submit_mark"])) {
    $roll = $_POST["roll"];
    $mark1 = $_POST["mark1"];
    $mark2 = $_POST["mark2"];
    $mark3 = $_POST["mark3"];
    $tmark = $mark1 + $mark2 + $mark3;

    $con = mysqli_connect('localhost', 'root', '', 'student');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO mark 
            VALUES ($roll, $mark1, $mark2, $mark3, $tmark)";

    if (mysqli_query($con, $sql)) {
        echo "<h3 style='color:green;'>Marks added successfully!</h3>";
    } else {
        echo "<h3 style='color:red;'>Error inserting marks: " . mysqli_error($con) . "</h3>";
    }
}
?>
