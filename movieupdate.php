<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Search User Email for Update</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
			background: linear-gradient(to right, rgb(0, 5, 0), rgb(170, 49, 12));
        }

        h3 {
            text-align: center;
            font-size: 24px; /* Increase the font size */
            color: white; /* Darken the text color */
			
        }

        form {
            text-align: center;
            margin-top: 5px; /* Add some space at the top */
			margin-left:15px;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px; /* Increase the font size */
        }

        input[type="submit"] {
            padding: 12px 20px; /* Increase padding to make the button larger */
            font-size: 18px; /* Increase the font size */
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h3>Search Movie Title for Update</h3>
    <form method="post" action="updatemovie.php">
        <input type="text" name="name" placeholder="Enter movie title">
        <input type="submit" name="submit" value="Search">
    </form>
</body>

</html>
