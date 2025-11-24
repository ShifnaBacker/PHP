
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Mark Entry</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Mark Entry</h2>

  <form method="post">
    <label>Roll Number</label>
    <select name="roll" required>
      <option value="">--Select Roll Number--</option>
      <?php
      $con = mysqli_connect('localhost','root','','student');
      $sql = "SELECT rollno FROM stud_det";
      $res = mysqli_query($con,$sql);
      while($r = mysqli_fetch_assoc($res)){
          echo "<option value='{$r['rollno']}'>{$r['rollno']}</option>";
      }
      ?>
    </select>

    <label>Mark 1</label>
    <input type="number" name="mark1" required>

    <label>Mark 2</label>
    <input type="number" name="mark2" required>

    <label>Mark 3</label>
    <input type="number" name="mark3" required>

    <div class="form-actions">
      <input class="btn btn-primary" type="submit" name="submit_mark" value="Submit Marks">
      <input class="btn btn-muted" type="reset" value="Reset">
    </div>
  </form>

  <?php
  if (isset($_POST["submit_mark"])) {
      $roll = (int)$_POST["roll"];
      $mark1 = (int)$_POST["mark1"];
      $mark2 = (int)$_POST["mark2"];
      $mark3 = (int)$_POST["mark3"];
      $tmark = $mark1 + $mark2 + $mark3;

      $sql = "INSERT INTO mark (rollno, mark1, mark2, mark3, total_mark)
              VALUES ($roll, $mark1, $mark2, $mark3, $tmark)";
      if (mysqli_query($con, $sql)) {
          echo "<div class='msg success'>Marks added successfully!</div>";
      } else {
          echo "<div class='msg error'>Error inserting marks: " . mysqli_error($con) . "</div>";
      }
  }
  mysqli_close($con);
  ?>
</div>

</body>
</html>
