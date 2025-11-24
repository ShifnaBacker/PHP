
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Top Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Top Student</h2>

  <?php
  $con = mysqli_connect('localhost','root','','student');
  if(!$con) { die("Connection failed: ".mysqli_connect_error()); }

  $sql = "SELECT s.rollno, s.name, m.mark1, m.mark2, m.mark3, m.total_mark 
          FROM mark m 
          INNER JOIN stud_det s ON m.rollno = s.rollno 
          ORDER BY m.total_mark DESC LIMIT 1";
  $result = mysqli_query($con,$sql);
  if($row = mysqli_fetch_assoc($result)){
      echo "<p><b>Roll Number:</b> {$row['rollno']}</p>";
      echo "<p><b>Name:</b> {$row['name']}</p>";
      echo "<p><b>Mark 1:</b> {$row['mark1']}</p>";
      echo "<p><b>Mark 2:</b> {$row['mark2']}</p>";
      echo "<p><b>Mark 3:</b> {$row['mark3']}</p>";
      echo "<p><b>Total Mark:</b> {$row['total_mark']}</p>";
  } else {
      echo "<div class='msg'>No records found.</div>";
  }
  mysqli_close($con);
  ?>
</div>

</body>
</html>
