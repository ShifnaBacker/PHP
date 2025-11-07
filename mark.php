<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Mark Entry</h1>
    <form action="" method='post'>
        <input type='hidden' name='roll' value='$roll'>
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
                echo "<option value='".$row["rollno"]."'>".$row["rollno"]."</option>";
            }
        }
        ?>
    </select><br><br>
        Mark 1: <input type='number' name='mark1' required><br><br>
        Mark 2: <input type='number' name='mark2' required><br><br>
        Mark 3: <input type='number' name='mark3' required><br><br>
        <input type='submit' name='submit_mark' value='Submit Marks'>
    </form>
</body>
</html>

    
    


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
