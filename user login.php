
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>User Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">
  <h1>User Login</h1>

  <form method="post">
    <input type="text" name="user" placeholder="Username" required>
    <input type="password" name="pass" placeholder="Password" required>

    <div class="form-actions">
      <input class="btn btn-primary" type="submit" name="login" value="Login">
      <input class="btn btn-muted" type="reset" value="Reset">
    </div>
  </form>

  <?php
  if(isset($_POST["login"])) {
      session_start();
      $user = mysqli_real_escape_string($con = mysqli_connect('localhost','root','','student'), $_POST["user"]);
      $pass = mysqli_real_escape_string($con, $_POST["pass"]);

      $sql = "SELECT * FROM stud_det WHERE username='$user' AND password='$pass'";
      $result = mysqli_query($con, $sql);

      if(mysqli_num_rows($result) > 0) {
          $_SESSION['username']=$user;
          $_SESSION['password']=$pass;
          echo "<script>window.location.href='user view.php';</script>";
      } else {
          echo "<div class='msg error'>Invalid username or password.</div>";
      }
      mysqli_close($con);
  }
  ?>
</div>

</body>
</html>
