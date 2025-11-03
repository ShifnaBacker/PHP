<?php
    $name=$_POST["name"];
    $roll=$_POST["roll"];
    $gender=$_POST["gender"];
    $mark1 = $_POST["mark1"];
    $mark2 = $_POST["mark2"];
    $mark3 = $_POST["mark3"];
    $tmark = $mark1 + $mark2 + $mark3;
    $con=mysqli_connect('localhost','root','','student');
    
    $sql="SELECT rollno FROM stud WHERE rollno = $roll";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
        echo "<script>alert('This roll number already exist');document.location='marklist.php'</script>";
    else{
        $sql2 = "INSERT INTO stud VALUES ($roll,'$name','$gender',$mark1,$mark2,$mark3,$tmark)";

    if (mysqli_query($con, $sql2)) {
        echo "<script>alert('Inserted successfully');document.location='marklist.php'</script>";
    }
    }

    

    mysqli_close($con);
    
 
?>