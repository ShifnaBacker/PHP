<!DOCTYPE html>
<html>
<head>
    <title>Top Student</title>
</head>
<body>


    
<?php
    $con = mysqli_connect('localhost', 'root', '', 'student');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT s.rollno, s.name, m.mark1, m.mark2, m.mark3, m.total_mark 
            FROM mark m 
            INNER JOIN stud_det s ON m.rollno = s.rollno 
            WHERE m.rollno = '$roll'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo "<b>Roll Number:</b> " . $row["rollno"] . "<br><br>";
            echo "<b>Name:</b> " . $row["name"] . "<br><br>";
            echo "<b>Mark 1:</b> " . $row["mark1"] . "<br><br>";
            echo "<b>Mark 2:</b> " . $row["mark2"] . "<br><br>";
            echo "<b>Mark 3:</b> " . $row["mark3"] . "<br><br>";
            echo "<b>Total Mark:</b> " . $row["total_mark"] . "<br><br>";

        }
?>
        

    <?php
    if (isset($_POST["search"]) && !empty($_POST["roll"])) {
        $roll = $_POST["roll"];
        $sql = "SELECT s.rollno, s.name, m.mark1, m.mark2, m.mark3, m.total_mark 
                FROM mark m 
                INNER JOIN stud_det s ON m.rollno = s.rollno 
                WHERE m.rollno = '$roll'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo "<b>Roll Number:</b> " . $row["rollno"] . "<br><br>";
            echo "<b>Name:</b> " . $row["name"] . "<br><br>";
            echo "<b>Mark 1:</b> " . $row["mark1"] . "<br><br>";
            echo "<b>Mark 2:</b> " . $row["mark2"] . "<br><br>";
            echo "<b>Mark 3:</b> " . $row["mark3"] . "<br><br>";
            echo "<b>Total Mark:</b> " . $row["total_mark"] . "<br><br>";

        } else {
            echo "No record found for Roll No $roll.";
        }
    }

    mysqli_close($con);
    ?>
</body>
</html>
