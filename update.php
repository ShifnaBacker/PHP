<?php
    $roll=$_GET["rollno"];
    $con = mysqli_connect('localhost', 'root', '', 'student');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT rollno,name,address,phone FROM stud_det WHERE rollno=$roll";
    $result = mysqli_query($con, $sql);

    if(!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
        echo "Roll Number: ".$row["rollno"];
        echo "<br><br>Name: ".$row["name"];   
        
    }
?>