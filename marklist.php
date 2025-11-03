<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef4ff;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #004aad;
        }
        form {
            background-color: #fff;
            padding: 20px;
            width: 320px;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
            text-align: left;
        }
        input[type="text"], input[type="number"] {
            width: 95%;
            padding: 6px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button, input[type="submit"], input[type="reset"] {
            background-color: #004aad;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }
        button:hover, input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #003580;
        }
        h3 {
            color: #333;
            border-bottom: 2px solid #004aad;
            display: inline-block;
            padding-bottom: 5px;
        }
        h4 {
            color: #222;
        }
    </style>
</head>
<body>
    <h1>Progress Card</h1>
    <form action="last page.php" method="post" name="mform">
        Name:
        <input type="text" name="name" id=""><br>
        Roll Number:
        <input type="number" name="roll" id=""><br>
        Gender:
        <input type="radio" name="gender" value="male" id="">Male
        <input type="radio" name="gender" value="female" id="">Female <br>

        <h3>Marks</h3><br>
        Subject 1:
        <input type="number" name="mark1" id="m1"><br>
        Subject 2:
        <input type="number" name="mark2" id="m2"><br>
        Subject 3:
        <input type="number" name="mark3" id="m3"><br>

        <button type="button" onclick="totalmark()">Total Mark</button>        
        <h4 id="tmark"></h4>

        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>

    <script>
        function totalmark() {
            let mark1 = parseInt(document.getElementById("m1").value);
            let mark2 = parseInt(document.getElementById("m2").value);
            let mark3 = parseInt(document.getElementById("m3").value);

            if (isNaN(mark1) || isNaN(mark2) || isNaN(mark3)) {
                alert("Please enter all marks before calculating total.");
                return;
            }

            let total = mark1 + mark2 + mark3;
            document.getElementById("tmark").innerHTML = "Total Mark: " + total;
        }
    </script>
</body>
</html>
