<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f7ff;
            text-align: center;
            padding: 20px;
        }
        h1 {
            color: #004aad;
        }
        .report {
            background-color: #fff;
            width: 340px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            text-align: left;
        }
        p {
            font-size: 16px;
            margin: 8px 0;
        }
        b {
            color: #222;
        }
    </style>
</head>
<body>
    <?php
        $name = $_POST["name"];
        $roll = $_POST["rollno"];
        $mark1 = $_POST["mark1"];
        $mark2 = $_POST["mark2"];
        $mark3 = $_POST["mark3"];
        $tmark = $mark1 + $mark2 + $mark3;
    ?> 
    <div class="report">
        <h1>Progress Report</h1>
        <p><b>Name:</b> <?php echo $name; ?></p>
        <p><b>Roll No:</b> <?php echo $roll; ?></p>
        <h3>Marks</h3>
        <p><b>Subject 1:</b> <?php echo $mark1; ?></p>
        <p><b>Subject 2:</b> <?php echo $mark2; ?></p>
        <p><b>Subject 3:</b> <?php echo $mark3; ?></p>
        <p><b>Total Mark:</b> <?php echo $tmark; ?></p>
    </div>
</body>
</html>
