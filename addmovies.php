<?php
include 'connection2.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $about = mysqli_real_escape_string($conn, $_POST["about"]);

    // Check if price is set and not empty
    if (isset($_POST["price"]) && !empty($_POST["price"])) {
        $price = mysqli_real_escape_string($conn, $_POST["price"]);

        // File upload handling
        $targetDir = __DIR__ . "/uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if "uploads" directory exists, create it if not
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Check if image file is a valid image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not a valid image.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
               
                echo "<script>alert('Successfuly added');</script>";

                
                $sql = "INSERT INTO movies (title, about, image, price) VALUES ('$title', '$about', '" . basename($_FILES["image"]["name"]) . "', '$price')";

                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('Movie added successful!');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
              
            }
        }
    } else {
        echo "<script>alert('Error Price is Empty');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, rgb(0, 5, 0), rgb(170, 49, 12));
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            
        }

        .container {
            background-color: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-right:5%;
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input {
            width: calc(100% - 16px);
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="file"] {
            border: none;
        }

        button {
            font-size: 15px;
            background-color: #4CAF50;
            color: #fff;
            padding: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 8px;
        }

        button:hover {
            background-color: #006400;
        }

        a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
            display: block;
            margin-top: 20px;
        }

        a:hover {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Movie</h2>
        <form method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="about">About:</label>
            <input type="text" id="about" name="about" required>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Add Movie</button>
        </form>
        <a href="movies.php">Go to Movie Gallery</a>
    </div>
</body>
</html>
