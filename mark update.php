<!DOCTYPE html>
<html>
<head>
    <title>Update Student Marks</title>
</head>
<body>

<form action="" method="post">
    Roll Number:
    <select name='roll' id=''>
        <option value="">--Select Roll Number--</option>
        <?php
        $con = mysqli_connect('localhost', 'root', '', 'student');
        if(!$con){
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT rollno FROM stud_det";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                // Keep selected option after search
                $selected = (isset($_POST["roll"]) && $_POST["roll"] == $row["rollno"]) ? "selected" : "";
                echo "<option value='".$row["rollno"]."' $selected>".$row["rollno"]."</option>";
            }
        }
        ?>
    </select>
    <input type="submit" name="search" value="Search"><br><br>

    <?php
    if(isset($_POST["search"]) && !empty($_POST["roll"])) {
        $roll = $_POST["roll"];
        $sql = "SELECT s.name, m.mark1, m.mark2, m.mark3 
        FROM mark m 
        INNER JOIN stud_det s ON m.rollno = s.rollno 
        WHERE m.rollno = '$roll'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            echo "Name: <b>".$row["name"]."</b><br><br>";
            echo "Mark 1: <input type='number' name='mark1' value='".$row["mark1"]."'><br><br>";
            echo "Mark 2: <input type='number' name='mark2' value='".$row["mark2"]."'><br><br>";
            echo "Mark 3: <input type='number' name='mark3' value='".$row["mark3"]."'><br><br>";
            echo "<input type='hidden' name='roll' value='".$roll."'>";
            echo "<input type='submit' name='update' value='Update'>";
            echo "<input type='reset' value='Reset'>";
        } else {
            echo "No record found for Roll No $roll.";
        }
    }

    // Handle update
    if(isset($_POST["update"])) {
        $roll = $_POST["roll"];
        $mark1 = $_POST["mark1"];
        $mark2 = $_POST["mark2"];
        $mark3 = $_POST["mark3"];
        $tmark = $mark1+$mark2+$mark3;
        $sql = "UPDATE mark SET mark1='$mark1', mark2='$mark2',mark3='$mark3', total_mark='$tmark' WHERE rollno='$roll'";
        if(mysqli_query($con, $sql)){
            echo "<br><br><b>Marks updated successfully for Roll No $roll!</b>";
        } else {
            echo "<br><br>Error updating record: " . mysqli_error($con);
        }
    }

    mysqli_close($con);
    ?>
</form>

</body>
</html>
