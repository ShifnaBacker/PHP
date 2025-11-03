Roll Number:
<select name="" id="">


<?php
    $con=mysqli_connect('localhost','root','','student');
    $sql="SELECT rollno FROM stud";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<option value =" .$row["rollno"].">".$row["rollno"]."</option>";
        }
    }
?>
</select>