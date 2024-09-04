<?php
include 'connection.php';

// Fetch jobs for gallery
$sql = "SELECT * FROM job";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<title>Job Portal | Job Listings</title>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .container {
        max-width: 1200px;
        margin: 0 auto;
        margin-top: 20px;
    }

    #jobGallery {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(calc(33.33% - 20px), 1fr));
        gap: 20px;
    }
    h1 {
        color: white;
        margin-top: 100px;
        margin-left: 40px;
    }

    .job {
        position: relative;
        border: 1px solid #ccc;
        overflow: hidden;
        width: 100%;
    }

    .job img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease-in-out;
    }

    .job .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
    }

    .job:hover .overlay {
        opacity: 1;
    }

    .job .overlay h3,
    .job .overlay p {
        margin: 0;
        font-size: 1.5em;
    }

    .job .overlay .buttons {
        display: flex;
        gap: 10px;
        margin-top: 20px;
    }

    .job .overlay button {
        padding: 15px 30px;
        background-color: red;
        color: #fff;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 1.2em;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .job .overlay button:hover {
        background-color: black;
    }
    
    body {
        background-color: #000;
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    #navigation {
        font-size: 10px;
        color: #fff;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        width: 100%;
        z-index: 1;
        left: 50%;
        transform: translateX(-50%);
        margin-top: -70px;
    }

    #logo {
        color: #f00;
        font-size: 30px;
        font-weight: bold;
        text-decoration: none;
        margin-left: 20px;
    }

    #menu {
        margin: 0 auto;
    }

    #menu a {
        color: #fff;
        text-decoration: none;
        margin: 0 10px;
        font-size: 18px;
        transition: color 0.3s, border-bottom 0.3s;
        position: relative;
    }

    #menu a:hover {
        color: #f00;
        border-bottom: 2px solid #f00;
    }

    #buttons-container {
        float: right;
    }

    .Login {
        background-color: rgb(182, 32, 32);
        color: rgb(255, 255, 255);
        padding: 6px 20px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        margin-left: 6px;
        margin-right: 3px;
        border-radius: 20px;
    }
    .AdminLogin {
        background-color: rgb(182, 32, 32);
        color: rgb(255, 255, 255);
        padding: 6px 13px;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        border-radius: 20px;
    }
    .Parking, .Ticketing {
        padding: 5px 13px;
        background-color: #00093c;
    }

    .Login:hover,
    .Ticketing:hover,
    .Parking:hover,
    .AdminLogin:hover {
        background-color: black;
    }

    #picassoFooter {
        background: linear-gradient(to right, #00093c, #2d0b00);
        color: #ffffff;
        padding: 40px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        align-items: center;
        font-family: 'Arial', sans-serif;
    }

    .footer-navigation, .footer-contact, .footer-social {
        margin: 10px;
    }

    .footer-navigation h3, .footer-contact h3, .footer-social h3 {
        color: #b40c0c;
        margin-bottom: 15px;
    }

    .footer-navigation ul, .footer-social .social-icons {
        list-style: none;
        padding: 0;
    }

    .footer-navigation ul li, .social-icon {
        margin-bottom: 10px;
        transition: transform 0.2s ease-in-out;
    }

    .footer-navigation ul li a, .social-icon {
        color: #ffffff;
        text-decoration: none;
    }

    .social-icons a {
        font-size: 35px;
        margin: 0 10px;
    }
    .social-icons a:hover {
        color: red;
    }
    .quicklink li a:hover {
        color: red;
    }
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="navigation">
    <div id="logo-container">
        <a href="#" id="logo">Job Portal</a>
    </div>

    <div id="menu">
        <a href="home.html">Home</a>
        <a href="contactus.html">Contact Us</a>
        <a href="aboutus.html">About Us</a>
        <a href="jobs.php">Jobs</a>
        <a class="Parking" href="parking.html">Parking</a>
        <a class="Ticketing" href="buyticketing.php">Buy Ticket</a>
        <a class="Login" href="main.html">Logout</a>
        <a class="AdminLogin" href="AdminLogin.html">Admin Login</a>
    </div>
</div>

<h1>Job Listings</h1>
<div class="container">
    <div id="jobGallery">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='job'>";
                echo "<img src='uploads/" . $row["image"] . "' alt='Job Image'>";
                echo "<div class='overlay'>";
                echo "<h3>" . $row["title"] . "</h3>";
                echo "<p>Salary: " . $row["salary"] . "</p>";
                
                echo "<div class='buttons'>";
                echo "<button onclick='applyJobAndRedirect(\"" . $row["title"] . "\", \"" . $row["salary"] . "\", \"" . $row["image"] . "\")'>Apply Now</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No jobs available.";
        }
        ?>
    </div>
</div>

<footer id="picassoFooter">
    <div class="footer-navigation">
        <h3>Quick Links</h3>
        <ul class="quicklink">
            <li><a href="home.html">Home</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="contactus.html">Contact Us</a></li>
            <li><a href="jobs.php">Jobs</a></li>
            <li><a href="parking.html">Parking</a></li>
            <li><a href="buyticket.html">Buy Ticket</a></li>
        </ul>
    </div>
    <div class="footer-contact">
        <h3>Contact Us</h3>
        <p>Email: info@jobportal.com</p>
        <p>Phone: 011 2322 4567</p>
        <h3>Our Branches</h3>
        <p>Kandy</p>
        <p>Colombo</p>
    </div>
    <div class="footer-social">
        <h3>Follow Us</h3>
        <div class="social-icons">
            <a href="https://facebook.com" class="fa fa-facebook"></a>
            <a href="https://twitter.com" class="fa fa-twitter"></a>
            <a href="https://instagram.com" class="fa fa-instagram"></a>
        </div>
    </div>
    <div id="logo-container">
        <a href="#" id="logo">Job Portal</a>
    </div>
</footer>

<script>
    function applyJobAndRedirect(title, salary, image) {
        // Redirect to application page or handle job application logic
        window.location.href = 'applyjob.php';
    }
</script>
</body>
</html>

<?php
$conn->close();
?>
