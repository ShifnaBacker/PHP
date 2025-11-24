
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Update Marks</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Update Student Marks</h2>

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

    <?php
    if(isset($_POST["search"]) && !empty($_POST["roll"])) {
        $roll = (int)$_POST["roll"];
        $sql = "SELECT s.name, m.mark1, m.mark2, m.mark3 
                FROM mark m 
                INNER JOIN stud_det s ON m.rollno = s.rollno 
                WHERE m.rollno = $roll";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            echo "<div class='form-row'><b>Name: </b> {$row['name']}</div>";
            echo "<label>Mark 1</label><input type='number' name='mark1' value='".$row["mark1"]."'>";
            echo "<label>Mark 2</label><input type='number' name='mark2' value='".$row["mark2"]."'>";
            echo "<label>Mark 3</label><input type='number' name='mark3' value='".$row["mark3"]."'>";
            echo "<input type='hidden' name='roll' value='$roll'><br>";
            echo "<div class='form-actions'><input class='btn btn-primary' type='submit' name='update' value='Update'>
                  <input class='btn btn-muted' type='reset' value='Reset'></div>";
        } else {
            echo "<div class='msg'>No record found for Roll No $roll.</div>";
        }
    }

    if(isset($_POST["update"])) {
        $roll = (int)$_POST["roll"];
        $mark1 = (int)$_POST["mark1"];
        $mark2 = (int)$_POST["mark2"];
        $mark3 = (int)$_POST["mark3"];
        $tmark = $mark1+$mark2+$mark3;
        $sql = "UPDATE mark SET mark1=$mark1, mark2=$mark2, mark3=$mark3, total_mark=$tmark WHERE rollno=$roll";
        if(mysqli_query($con, $sql)){
            echo "<div class='msg success'>Marks updated successfully for Roll No $roll!</div>";
        } else {
            echo "<div class='msg error'>Error updating record: " . mysqli_error($con) . "</div>";
        }
    }
    mysqli_close($con);
    ?>
  </form>
</div>

</body>
</html>
