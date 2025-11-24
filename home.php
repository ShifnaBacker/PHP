<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { margin:0; padding:0; height:100vh; display:flex; }
        iframe { height:100%; border:none; }

        #left-frame { width:25%; border-right:3px solid #555; }
        #right-frame { width:75%; }
    </style>
</head>
<body>

    <!-- Left menu iframe -->
    <iframe id="left-frame" src="links.php"></iframe>

    <!-- Right content iframe -->
    <iframe id="right-frame" name="frame1" src="student_registration.php"></iframe>

</body>
</html>
