<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>User Home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Your Details</h2>

<?php
if(!isset($_SESSION['username'])) {
    echo "<div class='msg error'>You are not logged in.</div>";
    exit;
}

$con = mysqli_connect('localhost','root','','student');
$user = mysqli_real_escape_string($con, $_SESSION['username']);
$pass = mysqli_real_escape_string($con, $_SESSION['password']);

$sql="SELECT s.rollno, s.name, s.address, s.phone, m.mark1, m.mark2, m.mark3, m.total_mark 
      FROM mark m 
      INNER JOIN stud_det s ON m.rollno = s.rollno 
      WHERE s.username='$user' AND s.password='$pass'";

$result = mysqli_query($con,$sql);

if($row = mysqli_fetch_assoc($result)){
    echo "<table style='width:100%;'><tr><th>Field</th><th>Value</th></tr>";
    echo "<tr><td>Roll Number</td><td>{$row['rollno']}</td></tr>";
    echo "<tr><td>Name</td><td>{$row['name']}</td></tr>";
    echo "<tr><td>Address</td><td>{$row['address']}</td></tr>";
    echo "<tr><td>Phone</td><td>{$row['phone']}</td></tr>";
    echo "<tr><td>Mark 1</td><td>{$row['mark1']}</td></tr>";
    echo "<tr><td>Mark 2</td><td>{$row['mark2']}</td></tr>";
    echo "<tr><td>Mark 3</td><td>{$row['mark3']}</td></tr>";
    echo "<tr><td>Total Mark</td><td>{$row['total_mark']}</td></tr>";
    echo "</table>";
} else {
    echo "<div class='msg'>No details found for your account.</div>";
}
mysqli_close($con);
?>

</div>
</body>
</html>
