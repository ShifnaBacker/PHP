<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;              /* full page height */
            display: flex;              /* side-by-side layout */
        }

        iframe {
            border: none;
            height: 100%;
        }

        /* Left frame (menu/navigation) */
        #left-frame {
            width: 25%;
            border-right: 3px solid #555;  /* vertical divider */
        }

        /* Right frame (main content) */
        #right-frame {
            width: 75%;
        }
    </style>
</head>
<body>
    <iframe id="left-frame" src="links.php"></iframe>
    <iframe id="right-frame" src="student registration.php" name="frame1"></iframe>
</body>
</html>
