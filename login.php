
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="card">
    <h1>Admin Login</h1>

    <form method="post" action="">
      <input type="text" name="user" placeholder="Username" required>
      <input type="password" name="pass" placeholder="Password" required>

      <div class="form-actions">
        <input class="btn btn-primary" type="submit" name="login" value="Login">
        <input class="btn btn-muted" type="reset" value="Reset">
      </div>
    </form>

    <?php
    if(isset($_POST["login"])) {
        $user = trim($_POST["user"]);
        $pass = trim($_POST["pass"]);

        if(empty($user) || empty($pass)) {
            echo "<div class='msg error'>Please enter both username and password.</div>";
        } else {
            $con = mysqli_connect('localhost', 'root', '', 'student');
            if (!$con) { die("Connection failed: " . mysqli_connect_error()); }

            $sql = "SELECT * FROM login WHERE user='".mysqli_real_escape_string($con,$user)."' AND pass='".mysqli_real_escape_string($con,$pass)."'";
            $result = mysqli_query($con, $sql);
            if(!$result){ echo "<div class='msg error'>Query error.</div>"; }
            else if(mysqli_num_rows($result) > 0) {
                echo "<script>window.location.href='home.php';</script>";
            } else {
                echo "<div class='msg error'>Invalid username or password.</div>";
            }
            mysqli_close($con);
        }
    }
    ?>
  </div>
</body>
</html>
