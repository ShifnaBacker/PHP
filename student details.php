<?php
    $con = mysqli_connect('localhost', 'root', '', 'student');
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT rollno,name,address,phone FROM stud_det";
    $result = mysqli_query($con, $sql);

    if(!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    
    if(mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Roll No</th><th>Name</th><th>Address</th>
        <th>Phone Number</th><th>Actions</th></tr>";

        while($row = mysqli_fetch_assoc($result)){
                echo "<tr><td>".$row["rollno"]."</td><td>".$row["name"]."</td><td>".$row["address"].
                "</td><td>".$row["phone"]."</td><td><a href='update.php?rollno=".$row["rollno"]."'
                >Update</a></td></tr>";
            }
        echo "</table>";
    }
?>