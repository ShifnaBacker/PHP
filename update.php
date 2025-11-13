<?php
$roll = $_GET["rollno"];
$con = mysqli_connect('localhost', 'root', '', 'student');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT rollno,name,address,phone FROM stud_det WHERE rollno=$roll";
$result = mysqli_query($con, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "<form method='post'>";
    echo "Roll Number: " . $row["rollno"];
    echo "<br><br>Name: " . $row["name"];
    echo "<br><br>Address: <textarea name='adrs'>" . $row["address"] . "</textarea><br><br>";
    echo "Phone Number: <input type='number' name='phone' value='" . $row["phone"] . "'><br><br>";
    echo "<input type='submit' name='update' value='Update'>";
    echo "<input type='submit' name='delete' value='Delete'>";
    echo "</form>";
}

// UPDATE
if (isset($_POST["update"])) {
    $adrs = $_POST["adrs"];
    $phone = $_POST["phone"];

    $sql = "UPDATE stud_det SET address='$adrs', phone='$phone' WHERE rollno='$roll'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<br><br><b>Details updated successfully for Roll No $roll!</b>";
    } else {
        echo "<br><br>Error updating record: " . mysqli_error($con);
    }
}

// DELETE
if (isset($_POST["delete"])) {
    $sql = "DELETE FROM stud_det WHERE rollno='$roll'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<br><br><b>Deleted details of Roll No $roll successfully</b>";
    } else {
        echo "<br><br>Error deleting record: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
