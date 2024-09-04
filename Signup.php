<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "workvista";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitizeInput($input)
{
    global $conn;
    return mysqli_real_escape_string($conn, htmlspecialchars(trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // Get user input from the signup form
    $username = sanitizeInput($_POST["username"]);
    $email = sanitizeInput($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $usertype = sanitizeInput($_POST["usertype"]); // Fixed this line

    // Check if the username already exists
    $checkUsernameQuery = "SELECT * FROM workvista WHERE username = ?";
    $checkUsernameStatement = $conn->prepare($checkUsernameQuery);
    $checkUsernameStatement->bind_param("s", $username);
    $checkUsernameStatement->execute();
    $checkUsernameResult = $checkUsernameStatement->get_result();

    if ($checkUsernameResult->num_rows > 0) {
        echo '<script>alert("Username already exists. Please choose a different username.");</script>';
    } else {
        // Insert user data into the database
        $insertQuery = "INSERT INTO workvista (username, email, password, usertype) VALUES (?, ?, ?, ?)";
        $insertStatement = $conn->prepare($insertQuery);
        $insertStatement->bind_param("ssss", $username, $email, $password, $usertype);
        
        if ($insertStatement->execute()) {
            echo '<script>alert("Register Successfully");</script>';
        } else {
            echo "Error: " . $insertStatement->error;
        }
    }
}



// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
    // Get user input from the login form
    $loginUsername = sanitizeInput($_POST["loginUsername"]);
    $loginPassword = sanitizeInput($_POST["loginPassword"]);

    // Retrieve user data from the database based on the entered username
    $sql = "SELECT * FROM workvista WHERE username = '$loginUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($loginPassword, $row["password"])) {
            // Login successful
            // Start a session and store user information
            session_start();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];
            $_SESSION['user_email'] = $row['email'];

            // Redirect based on user type
            switch ($_SESSION['usertype']) {
                case 'admin':
                    header("Location: nn.html");
                    break;
                case 'cinema':
                    header("Location: cinema_dashboard.php");
                    break;
                case 'jobseeker':
                    header("Location:profile.html");
                    break;
                default:
                    echo "Invalid user type";
                    break;
            }
        } else {
            echo '<script>alert("Incorrect Password, please try again");</script>';
        }
    } else {
        echo '<script>alert("User not found, please check your username or password");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>


  
    <title>Sign in & Sign up Form</title>
    
</head>
<style>
    
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap');

    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Montserrat', sans-serif;
}

body,
input {
    font-family: 'Montserrat', sans-serif;
}

.container {
    position: relative;
    width: 100%;
    background-color: #1a1a1a; /* Dark background color */
    min-height: 100vh;
    overflow: hidden;
}

.forms-container {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
}

.signin-signup {
    position: absolute;
    top: 50%;
    transform: translate(-50%, -50%);
    left: 75%;
    width: 50%;
    transition: 1s 0.7s ease-in-out;
    display: grid;
    grid-template-columns: 1fr;
    z-index: 5;
}

form {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    padding: 0rem 5rem;
    transition: all 0.2s 0.7s;
    overflow: hidden;
    grid-column: 1 / 2;
    grid-row: 1 / 2;
}

form.sign-up-form {
    opacity: 0;
    z-index: 1;
}

form.sign-in-form {
    z-index: 2;
}

.title {
    font-size: 2.2rem;
    color: #fff; /* White text color */
    margin-bottom: 10px;
}

.input-field {
    max-width: 380px;
    width: 100%;
    background-color: #333; /* Dark input field background color */
    margin: 10px 0;
    height: 55px;
    border-radius: 5px;
    display: grid;
    grid-template-columns: 15% 85%;
    padding: 0 0.4rem;
    position: relative;
}

.input-field i {
    text-align: center;
    line-height: 55px;
    color: #acacac;
    transition: 0.5s;
    font-size: 1.1rem;
}

.input-field input {
    background: none;
    outline: none;
    border: none;
    line-height: 1;
    font-weight: 600;
    font-size: 1.1rem;
    color: #fff; /* White text color */
}

.input-field input::placeholder {
    color: #aaa;
    font-weight: 500;
}

.social-text {
    padding: 0.7rem 0;
    font-size: 1rem;
    color: #aaa; /* Light text color */
}

.social-media {
    display: flex;
    justify-content: center;
}

.social-icon {
    height: 46px;
    width: 46px;
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 0 0.45rem;
    color: #fff; /* White icon color */
    border-radius: 50%;
    border: 1px solid #fff; /* White border color */
    text-decoration: none;
    font-size: 1.1rem;
    transition: 0.3s;
}

.social-icon:hover {
    color: rgb(7, 96, 128); /* Orange color on hover */
    border-color: rgb(7, 96, 128); /* Orange color on hover */
}

.btn {
    width: 150px;
    background-color: rgb(7, 96, 128); /* Orange button color */
    border: none;
    outline: none;
    height: 49px;
    border-radius: 4px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 600;
    margin: 10px 0;
    cursor: pointer;
    transition: 0.5s;
}

.btn:hover {
    background-color: rgb(7, 96, 128); /* Lighter orange color on hover */
}

.panels-container {
    position: absolute;
    height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
}

.container:before {
    content: "";
    position: absolute;
    height: 2000px;
    width: 2000px;
    top: -10%;
    right: 48%;
    transform: translateY(-50%);
    background-image: linear-gradient(-45deg, rgb(7, 96, 128) 0%, rgb(7, 96, 128) 100%);
    transition: 1.8s ease-in-out;
    border-radius: 50%;
    z-index: 6;
}

.image {
    width: 100%;
    transition: transform 1.1s ease-in-out;
    transition-delay: 0.4s;
}

.panel {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: space-around;
    text-align: center;
    z-index: 6;
}

.left-panel {
    pointer-events: all;
    padding: 3rem 17% 2rem 12%;
}

.right-panel {
    pointer-events: none;
    padding: 3rem 12% 2rem 17%;
}

.panel .content {
    color: #fff;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.6s;
}

.panel h3 {
    font-weight: 600;
    line-height: 1;
    font-size: 1.5rem;
}

.panel p {
    font-size: 0.95rem;
    padding: 0.7rem 0;
}

.btn.transparent {
    margin: 0;
    background: none;
    border: 2px solid #fff;
    width: 130px;
    height: 41px;
    font-weight: 600;
    font-size: 0.8rem;
}

.right-panel .image,
.right-panel .content {
    transform: translateX(800px);
}

/* ANIMATION */

.container.sign-up-mode:before {
    transform: translate(100%, -50%);
    right: 52%;
}

.container.sign-up-mode .left-panel .image,
.container.sign-up-mode .left-panel .content {
    transform: translateX(-800px);
}

.container.sign-up-mode .right-panel .image,
.container.sign-up-mode .right-panel .content {
    transform: translateX(0%);
}

.container.sign-up-mode .signin-signup {
    left: 25%;
}

.container.sign-up-mode form.sign-up-form {
    opacity: 1;
    z-index: 2;
}

.container.sign-up-mode form.sign-in-form {
    opacity: 0;
    z-index: 1;
}

.container.sign-up-mode .left-panel {
    pointer-events: none;
}

.container.sign-up-mode .right-panel {
    pointer-events: all;
}

@media (max-width: 870px) {
.container {
    min-height: 800px;
    height: 100vh;
}
.signin-signup {
    width: 100%;
    top: 95%;
    transform: translate(-50%, -100%);
    transition: 1s 0.8s ease-in-out;
}

.signin-signup,
.container.sign-up-mode .signin-signup {
    left: 50%;
}

.panels-container {
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 2fr 1fr;
}

.panel {
    flex-direction: row;
    justify-content: space-around;
    align-items: center;
    padding: 2.5rem 8%;
    grid-column: 1 / 2;
}

.right-panel {
    grid-row: 3 / 4;
}

.left-panel {
    grid-row: 1 / 2;
}

.image {
    width: 200px;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.6s;
}

.panel .content {
    padding-right: 15%;
    transition: transform 0.9s ease-in-out;
    transition-delay: 0.8s;
}

.panel h3 {
    font-size: 1.2rem;
}

.panel p {
    font-size: 0.7rem;
    padding: 0.5rem 0;
}

.btn.transparent {
    width: 110px;
    height: 35px;
    font-size: 0.7rem;
}

.container:before {
    width: 1500px;
    height: 1500px;
    transform: translateX(-50%);
    left: 30%;
    bottom: 68%;
    right: initial;
    top: initial;
    transition: 2s ease-in-out;
}

.container.sign-up-mode:before {
    transform: translate(-50%, 100%);
    bottom: 32%;
    right: initial;
}

.container.sign-up-mode .left-panel .image,
.container.sign-up-mode .left-panel .content {
    transform: translateY(-300px);
}

.container.sign-up-mode .right-panel .image,
.container.sign-up-mode .right-panel .content {
    transform: translateY(0px);
}

.right-panel .image,
.right-panel .content {
    transform: translateY(300px);
}

.container.sign-up-mode .signin-signup {
    top: 5%;
    transform: translate(-50%, 0);
}
}

@media (max-width: 570px) {
form {
    padding: 0 1.5rem;
}

.image {
    display: none;
}
.panel .content {
    padding: 0.5rem 1rem;
}
.container {
    padding: 1.5rem;
}

.container:before {
    bottom: 72%;
    left: 50%;
}

.container.sign-up-mode:before {
    bottom: 28%;
    left: 50%;
}
}
.input-field {
    position: relative;
    margin-bottom: 20px;
}

.input-field select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    outline: none;
    font-size: 16px;
    background-color: grey;
}




</style>
<body>
    
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="#" method="post" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="loginUsername" placeholder="Username" required />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="loginPassword" placeholder="Password" required />
                    </div>
                    <input type="submit" name="login" value="Login" class="btn solid" />
                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <form action="#" method="post" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="input-field">
            <i class="fas fa-user-tag"></i>
            <select name="usertype" required>
                <option  value="" disabled selected>Select User Type</option>
                <option value="admin">Admin</option>
                <option value="jobseeker">Job Seeker</option>
                <option value="company">Company</option>
            </select>
        </div>

                    
                    <input type="submit" name="signup" class="btn" value="Sign up" />
                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Join with us</h3>
                    <p>
                        WorkVista.lk
                    </p>
                    <button href="profile.php" class="btn transparent" id="sign-up-btn">
                        Sign up
                    </button>
                </div>
                
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Our Valued Members</h3>
                    <p>
                    <p>
    Join us in finding your dream job and advancing your career to new heights!
</p>

                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Sign in
                    </button>
                </div>
                
            </div>
        </div>
    </div>

    <script src="Signup.js"></script>
</body>

</html>