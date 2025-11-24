
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Progress Card</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Progress Card</h2>
  <div style="text-align:center;margin-bottom:10px;"><a href="top student.php" class="btn btn-muted">View Top Student</a></div>

  <form method="post">
    <label>Roll Number</label>
    <select name="roll" required>
      <option value="">--Select Roll Number--</option>
      <?php
      $con = mysqli_connect('localhost','root','','student');
      $sql = "SELECT rollno FROM stud_det";
      $res = mysqli_query($con,$sql);
      while($r = mysqli_fetch_assoc($res)){
          $sel = (isset($_POST['roll']) && $_POST['roll']==$r['rollno']) ? "selected" : "";
          echo "<option value='{$r['rollno']}' $sel>{$r['rollno']}</option>";
      }
      ?>
    </select>

    <div class="form-actions">
      <input class="btn btn-primary" type="submit" name="search" value="Search">
    </div>
  </form>

  <?php
  if (isset($_POST["search"]) && !empty($_POST["roll"])) {
      $roll = (int)$_POST["roll"];
      $sql = "SELECT s.rollno, s.name, m.mark1, m.mark2, m.mark3, m.total_mark 
              FROM mark m 
              INNER JOIN stud_det s ON m.rollno = s.rollno 
              WHERE m.rollno = $roll";
      $result = mysqli_query($con, $sql);

      if ($row = mysqli_fetch_assoc($result)) {
          echo "<div class='card' style='max-width:640px;margin:16px auto;text-align:left;'>
                  <h2 class='small'>Progress Card</h2>
                  <p><b>Roll Number:</b> {$row['rollno']}</p>
                  <p><b>Name:</b> {$row['name']}</p>
                  <p><b>Mark 1:</b> {$row['mark1']}</p>
                  <p><b>Mark 2:</b> {$row['mark2']}</p>
                  <p><b>Mark 3:</b> {$row['mark3']}</p>
                  <p><b>Total Mark:</b> {$row['total_mark']}</p>
                </div>";
      } else {
          echo "<div class='msg'>No record found for Roll No $roll.</div>";
      }
  }
  mysqli_close($con);
  ?>
</div>

</body>
</html>
