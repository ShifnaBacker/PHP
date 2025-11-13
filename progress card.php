<!DOCTYPE html>
<html>
<head>
    <title>Progress Card</title>
</head>
<body>
    <a href="top student.php"><b>View Top Student</b></a><br><br>

    <form action="" method="post">
        Roll Number:
        <select name='roll'>
            <option value="">--Select Roll Number--</option>
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'student');
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $sql = "SELECT rollno FROM stud_det";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = (isset($_POST["roll"]) && $_POST["roll"] == $row["rollno"]) ? "selected" : "";
                    echo "<option value='".$row["rollno"]."' $selected>".$row["rollno"]."</option>";
                }
            }
            ?>
        </select>
        <input type="submit" name="search" value="Search"><br><br>
    </form>

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
