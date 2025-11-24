
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Update Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Update / Delete Student</h2>

<?php
if(!isset($_GET['rollno'])) {
    echo "<div class='msg error'>No roll number specified.</div>";
    exit;
}
$roll = (int)$_GET['rollno'];
$con = mysqli_connect('localhost','root','','student');
if(!$con){ die("Connection failed: ".mysqli_connect_error()); }

$sql = "SELECT rollno,name,address,phone FROM stud_det WHERE rollno=$roll";
$result = mysqli_query($con,$sql);
if(!$result){ echo "<div class='msg error'>".mysqli_error($con)."</div>"; exit; }
if(mysqli_num_rows($result) == 0){ echo "<div class='msg'>Student not found.</div>"; exit; }

$row = mysqli_fetch_assoc($result);

echo "<form method='post'>
        <div class='form-row'><b>Roll Number:</b> {$row['rollno']}</div>
        <div class='form-row'><b>Name:</b> {$row['name']}</div>
        <div class='form-row'><label>Address</label><textarea name='adrs'>".htmlspecialchars($row['address'])."</textarea></div>
        <div class='form-row'><label>Phone</label><input type='number' name='phone' value='".htmlspecialchars($row['phone'])."'></div>
        <div class='form-actions'>
          <input class='btn btn-primary' type='submit' name='update' value='Update'>
          <input class='btn btn-danger' type='submit' name='delete' value='Delete'>
        </div>
      </form>";

if(isset($_POST['update'])){
    $adrs = mysqli_real_escape_string($con,$_POST['adrs']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $sqlu = "UPDATE stud_det SET address='$adrs', phone='$phone' WHERE rollno=$roll";
    if(mysqli_query($con,$sqlu)) echo "<div class='msg success'>Details updated successfully for Roll No $roll!</div>";
    else echo "<div class='msg error'>Error updating: ".mysqli_error($con)."</div>";
}

if(isset($_POST['delete'])){
    $sqld = "DELETE FROM stud_det WHERE rollno=$roll";
    if(mysqli_query($con,$sqld)) echo "<div class='msg success'>Deleted details of Roll No $roll successfully</div>";
    else echo "<div class='msg error'>Error deleting: ".mysqli_error($con)."</div>";
}

mysqli_close($con);
?>

</div>
</body>
</html>
