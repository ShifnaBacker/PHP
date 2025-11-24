
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Student Registration</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h2>Student Registration</h2>

  <form method="post">
    <div class="form-row">
      <label>Roll Number</label>
      <input type="number" name="roll" required>
    </div>

    <div class="form-row">
      <label>Name</label>
      <input type="text" name="name" required>
    </div>

    <div class="form-row">
      <label>Address</label>
      <textarea name="adrs" required></textarea>
    </div>

    <div class="form-row">
      <label>Phone Number</label>
      <input type="number" name="phone" required>
    </div>

    <div class="form-row">
      <label>Username</label>
      <input type="text" name="user" required>
    </div>

    <div class="form-row">
      <label>Password</label>
      <input type="password" name="pass" required>
    </div>

    <div class="form-row">
      <label>Retype Password</label>
      <input type="password" name="repass" required>
    </div>

    <div class="form-actions">
      <input class="btn btn-primary" type="submit" name="regstr" value="Register">
      <input class="btn btn-muted" type="reset" value="Reset">
    </div>
  </form>

  <?php
  if(isset($_POST["regstr"])){
      $roll = (int)$_POST["roll"];
      $name = mysqli_real_escape_string($con = mysqli_connect('localhost','root','','student'), $_POST["name"]);
      $adrs = mysqli_real_escape_string($con, $_POST["adrs"]);
      $phone = mysqli_real_escape_string($con, $_POST["phone"]);
      $user = mysqli_real_escape_string($con, $_POST["user"]);
      $pass = mysqli_real_escape_string($con, $_POST["pass"]);
      $repass = mysqli_real_escape_string($con, $_POST["repass"]);

      if ($pass !== $repass) {
          echo "<div class='msg error'>Passwords do not match!</div>";
          mysqli_close($con);
      } else {
          $sql = "INSERT INTO stud_det (rollno, name, address, phone, username, password)
                  VALUES ($roll, '$name', '$adrs', '$phone', '$user', '$pass')";

          if (mysqli_query($con, $sql)) {
              echo "<div class='msg success'>Registration successful!</div>";
          } else {
              echo "<div class='msg error'>Error: " . mysqli_error($con) . "</div>";
          }
          mysqli_close($con);
      }
  }
  ?>
</div>

</body>
</html>
