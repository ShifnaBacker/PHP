<?php
    $name=$_POST["name"];
    $roll=$_POST["roll"];
    $con=mysqli_connect('localhost','root','','student');
    if($con)
    {
        echo "Succesfully Connected <br><br>";   
    }
     $sql = "INSERT INTO stud(Roll_Number,Name) VALUES ($roll, '$name')";

    if (mysqli_query($con, $sql)) {
        echo "Inserted successfully<br><br>";
    } else {
        echo "Error inserting data: " . mysqli_error($con); // shows actual error
    }

    mysqli_close($con);
 
?>