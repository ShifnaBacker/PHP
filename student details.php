
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Details</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="table-card">
  <h2 style="text-align:center; padding-top:12px;">Student Details</h2>

<?php
$con = mysqli_connect('localhost', 'root', '', 'student');
if (!$con) { die("Connection failed: " . mysqli_connect_error()); }

$sql = "SELECT rollno,name,address,phone FROM stud_det";
$result = mysqli_query($con, $sql);

if(!$result) { echo "<div class='msg error'>Query failed: ".mysqli_error($con)."</div>"; }
else if(mysqli_num_rows($result) > 0) {
    echo "<table><tr><th>Roll No</th><th>Name</th><th>Address</th><th>Phone</th><th>Actions</th></tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>{$row['rollno']}</td>
                <td>{$row['name']}</td>
                <td>{$row['address']}</td>
                <td>{$row['phone']}</td>
                <td><a href='update.php?rollno={$row['rollno']}'>Update</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<div class='msg'>No students found.</div>";
}
mysqli_close($con);
?>

</div>
</body>
</html>
