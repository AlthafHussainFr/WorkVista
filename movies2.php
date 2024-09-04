<!DOCTYPE html>
<html lang="en">

<head>
    <title>CINEPLEX | MOVIES</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Poppins", sans-serif;
            background-color: white;
            overflow: auto;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
            max-width: 1200px;
            margin: 20px auto;
        }

        /* //........top text ........// */

        :root {
            --primary-color: rgb(7, 96, 128);
            --light-black: rgba(0, 0, 0, 0.89);
            --black: #000;
            --white: #fff;
            --grey: #aaa;
        }

        /* //........top text ........// */

        .top-txt {
            background-color: var(--black);
        }

        .head {
            display: flex;
            justify-content: space-between;
            color: rgba(255, 255, 255, 0.945);
            padding: 10px 0;
            font-size: 14px;
        }

        .head a {
            text-decoration: none;
            color: rgba(255, 255, 255, 0.945);
            margin: 0 10px;
        }

        /* //........ Navbar ........// */

        .navbar input[type="checkbox"],
        .navbar .hamburger-lines {
            display: none;
        }

        .navbar {
            box-shadow: 0 5px 4px rgb(146 161 176 / 15%);
            position: sticky;
            top: 0;
            background: var(--white);
            color: var(--black);
            z-index: 100;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu-items {
            display: flex;
            margin-right: 3rem;
            font-size: xx-small;
        }

        .menu-items li {
            list-style: none;
            margin-left: 1.5rem;
            font-size: 5px;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 64px;
        }

        .navbar img {
            margin-left: 3rem;
        }

        .navbar-container ul a {
            text-decoration: none;
            color: var(--black);
            font-size: 18px;
            position: relative;
        }

        .navbar-container ul a:after {
            content: "";
            position: absolute;
            background: var(--primary-color);
            height: 3px;
            width: 0;
            left: 0;
            bottom: -10px;
            transition: 0.3s;
        }

        .navbar-container ul a:hover:after {
            width: 100%;
        }

        @media (max-width: 768px) {
            .navbar {
                opacity: 0.95;
            }

            .navbar-container input[type="checkbox"],
            .navbar-container .hamburger-lines {
                display: block;
            }

            .navbar-container {
                display: block;
                position: relative;
                height: 64px;
            }

            .navbar-container input[type="checkbox"] {
                position: absolute;
                display: block;
                height: 32px;
                width: 30px;
                top: 20px;
                left: 20px;
                z-index: 5;
                opacity: 0;
                cursor: pointer;
            }

            .navbar-container .hamburger-lines {
                display: block;
                height: 28px;
                width: 35px;
                position: absolute;
                top: 20px;
                left: 20px;
                z-index: 2;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .navbar-container .hamburger-lines .line {
                display: block;
                height: 4px;
                width: 100%;
                border-radius: 10px;
                background: #333;
            }

            .navbar-container .hamburger-lines .line1 {
                transform-origin: 0% 0%;
                transition: transform 0.3s ease-in-out;
            }

            .navbar-container .hamburger-lines .line2 {
                transition: transform 0.2s ease-in-out;
            }

            .navbar-container .hamburger-lines .line3 {
                transform-origin: 0% 100%;
                transition: transform 0.3s ease-in-out;
            }

            .navbar .menu-items {
                padding-top: 100px;
                background: #fff;
                height: 100vh;
                max-width: 100%;
                transform: translate(-150%);
                display: flex;
                flex-direction: column;
                text-align: center;
                transition: transform 0.5s ease-in-out;
                overflow: scroll;
            }

            .navbar .menu-items li {
                margin-bottom: 2rem;
                font-size: 1.1rem;
                font-weight: 500;
            }

            .menu-items li,
            .navbar img {
                margin: 0;
            }

            .navbar .menu-items li:nth-child(1) {
                margin-top: 1.5rem;
            }

            .navbar-container .logo img {
                position: absolute;
                top: 10px;
                right: 15px;
                margin-top: 8px;
            }

            .navbar-container input[type="checkbox"]:checked~.menu-items {
                transform: translateX(0);
            }

            .navbar-container input[type="checkbox"]:checked~.hamburger-lines .line1 {
                transform: rotate(45deg);
            }

            .navbar-container input[type="checkbox"]:checked~.hamburger-lines .line2 {
                transform: scaleY(0);
            }

            .navbar-container input[type="checkbox"]:checked~.hamburger-lines .line3 {
                transform: rotate(-45deg);
            }

            .navbar-container input[type="checkbox"]:checked~.home_page img {
                display: none;
                background: #fff;
            }
        }

        .logo {
            color: rgb(7, 96, 128);
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
            margin-left: 20px;
            position: absolute;
            top: 0;
            left: 0;
            margin: 10px;
        }

        .Login {
            background-color: rgb(7, 96, 128);
            color: rgb(255, 255, 255);
            padding: 6px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
            margin-left: 6px;
            margin-right: 3px;
            border-radius: 20px;
            position: absolute;
            top: 0;
            right: 0;
            margin: 10px;
            text-decoration: none;
        }

        .Login:hover {
            background-color: black;
        }

        #movieGallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
        }

        .movie {
            position: relative;
            border: 1px solid #ccc;
            overflow: hidden;
            width: 100%;
            height: 100%;
        }

        .movie-title {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: #fff;
            padding: 10px;
            box-sizing: border-box;
            text-align: center;
            font-size: 1.2em;
        }

        .movie img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease-in-out;
        }

        .movie .overlay {
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

        .movie:hover .overlay {
            opacity: 1;
        }

        .movie .overlay h3 {
            margin: 0;
            font-size: 1em;
        }

        .movie .buttons {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .movie .buttons button {
            background: var(--primary-color);
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .movie .buttons button:hover {
            background-color: darkblue;
        }

        #searchBar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        #searchInput {
            padding: 10px;
            font-size: 16px;
            width: 70%;
        }

        #filterDropdown {
            padding: 10px;
            font-size: 16px;
        }

        footer {
    width: 100%;
    background:  rgb(7, 96, 128);
}

.footer-container .content_1 img {
    height: 25px;
    width: 180px;
}

.footer-container {
    display: flex;
    justify-content: space-between;
    padding: 60px 0;
}

.footer-container h4 {
    color: var(--white);
    font-weight: 500;
    letter-spacing: 1px;
    margin-bottom: 25px;
    font-size: 18px;
}

.footer-container a {
    display: block;
    text-decoration: none;
    color: rgb(233, 233, 233);
    margin-bottom: 15px;
    font-size: 14px;
}

.footer-container .content_1 p,
.footer-container .content_4 p {
    color: var(--grey);
    margin: 25px 0;
    font-size: 14px;
}

.footer-container .content_4 input[type="email"] {
    background-color:rgb(7, 96, 128);
    border: none;
    color: black;
    outline: none;
    padding: 15px 0;
}

.footer-container .content_4 .f-mail {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-container .content_4 .bx {
    color: var(--white);
}

.f-design {
    width: 100%;
    color: var(--white);
    text-align: center;
}

.f-design .f-design-txt {
    border-top: 1px solid var(--grey);
    padding: 25px 0;
    font-size: 14px;
    color: var(--grey);
}


/* //........ contact ...... // */

.contact {
    margin-top: 45px;
}

iframe {
    height: 72vh;
    width: 100%;
}

.form {
    display: flex;
    justify-content: space-between;
    margin: 80px 0;
}

.form .form-txt {
    flex-basis: 48%;
}

.form .form-txt h4 {
    font-weight: 600;
    color: var(--primary-color);
    letter-spacing: 1.5px;
    font-size: 15px;
    margin-bottom: 15px;
}

.form .form-txt h1 {
    font-weight: 600;
    color: var(--black);
    font-size: 40px;
    letter-spacing: 1.5px;
    margin-bottom: 10px;
    color: var(--light-black);
}

.form .form-txt span {
    color: var(--light-black);
    font-size: 14px;
}

.form .form-txt h3 {
    font-size: 22px;
    font-weight: 600;
    margin: 15px 0;
    color: var(--light-black);
}

.form .form-txt p {
    color: var(--light-black);
    font-size: 14px;
}

.form .form-details {
    flex-basis: 48%;
}

.form .form-details input[type="text"],
.form .form-details input[type="email"] {
    padding: 15px 20px;
    color: var(--grey);
    outline: none;
    border: 1px solid var(--grey);
    margin: 35px 15px;
    font-size: 14px;
}

.form .form-details textarea {
    padding: 15px 20px;
    margin: 0 15px;
    color: var(--grey);
    outline: none;
    border: 1px solid var(--grey);
    font-size: 14px;
    resize: none;
}

.form .form-details button {
    padding: 15px 25px;
    color: var(--white);
    font-weight: 500;
    background: var(--black);
    outline: none;
    border: none;
    margin: 15px;
    font-size: 14px;
    letter-spacing: 2px;
    cursor: pointer;
}


/* //....... Media Queries .......// */

@media (max-width: 500px) {
    .head {
        display: none;
    }
    .top-txt .head p,
    .top-txt .head a {
        font-size: 10px;
    }
    .home_txt h2,
    .home_txt .home_label p {
        display: none;
    }
    .home_txt {
        position: absolute;
        top: 20%;
        left: 5%;
        font-size: 12px;
    }
    .home_txt button {
        padding: 7px 7px;
        font-size: 10px;
    }
    .home_txt i {
        display: none;
    }
    .home_txt .home_social_icons {
        /* display: flex; */
        display: none;
    }
    .menu-items {
        margin-right: 0;
    }
    .best-seller {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .l-news {
        display: flex;
        flex-direction: column;
        margin-right: 30px;
    }
    .l-news .l-news1,
    .l-news .l-news2 {
        margin-bottom: 200px;
    }
    .footer-container {
        display: flex;
        flex-direction: column;
    }
    .footer-container .content_1 {
        margin-bottom: 30px;
    }
     
    .best-seller img {
        padding-top: 40px;
    }
}

@media(min-width: 501px) and (max-width: 768px) {
    .head {
        display: none;
    }
    .top-txt .head p,
    .top-txt .head a {
        font-size: 10px;
    }
    .home_txt h2,
    .home_txt .home_label p {
        display: none;
    }
    .home_txt {
        position: absolute;
        top: 20%;
        left: 5%;
        font-size: 12px;
    }
    .home_txt button {
        padding: 7px 7px;
        font-size: 10px;
    }
    .home_txt i {
        display: none;
    }
    .home_txt .home_social_icons {
        /* display: flex; */
        display: none;
    }
    .menu-items {
        margin-right: 0;
    }
    .best-seller {
        display: flex;
        flex-direction: column;
    }
    .l-news {
        display: flex;
        flex-direction: column;
        margin-right: 30px;
    }
    .l-news .l-news1,
    .l-news .l-news2 {
        margin-bottom: 200px;
    }
    .footer-container {
        display: flex;
        flex-direction: column;
    }
    .footer-container .content_1 {
        margin-bottom: 30px;
    }
    .best-seller img {
        padding-top: 40px;
    }
}

@media(orientation: landscape) and (max-height: 500px) {
    .header {
        height: 90vmax;
    }
}

        @media (max-width: 1024px) {
            .footer-container {
                flex-direction: column;
                text-align: center;
            }

            .footer-container div {
                margin-bottom: 20px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 20px;
            }

            #movieGallery {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }

            #searchInput {
                width: 60%;
            }
        }

        @media (max-width: 480px) {
            #searchInput {
                width: 100%;
            }

            #filterDropdown {
                width: 100%;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-container">
            <input type="checkbox" id="checkbox">
            <div class="hamburger-lines">
                <span class="line line1"></span>
                <span class="line line2"></span>
                <span class="line line3"></span>
            </div>
            <ul class="menu-items">
                <li><a href="job.html#home">Home</a></li>
                <li><a href="jobsearch.html">Jobs</a></li>
                <li><a href="job.html#news">Customers</a></li>
                <li><a href="job.html#contact">Contact</a></li>
                <li><a href="nn.html">Our partners</a></li>
            </ul>
            <a class="Login" href="Signup.php">Join with us</a>
            <div class="logo">WorkVista.lk</div>
        </div>
    </nav>

    <div class="container">
        <div id="searchBar">
            <input type="text" id="searchInput" placeholder="Search Jobs by Title">
            <select id="filterDropdown">
                <option value="">All Type</option>
                <option value="Part Time">Part Time</option>
                <option value="Full Time">Full Time</option>
            </select>
        </div>

        <div id="movieGallery">
            <?php
            include 'connection2.php';

            $searchQuery = "";
            $filter = "";

            if (isset($_GET['search'])) {
                $searchQuery = " AND title LIKE '%" . $_GET['search'] . "%'";
            }

            if (isset($_GET['filter'])) {
                $filter = " AND about = '" . $_GET['filter'] . "'";
            }

            $sql = "SELECT * FROM movies WHERE 1=1" . $searchQuery . $filter;
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='movie' data-genre='" . $row["about"] . "'>";
                    echo "<div class='image-container'>";
                    echo "<img src='uploads/" . $row["image"] . "' alt='Movie Image'>";
                    echo "<div class='movie-title'>" . $row["title"] . "</div>";
                    echo "</div>";
                    echo "<div class='overlay'>";
                    echo "<p>" . $row["about"] . "</p>";
                    echo "<div class='buttons'>";
                    echo "<button onclick='buyTicketAndRedirect(\"" . $row["title"] . "\", \"" . $row["about"] . "\", \"" . $row["image"] . "\")'>Apply Job</button>";
                    echo "<button onclick='moreInfo(\"" . $row["title"] . "\", \"" . $row["about"] . "\", \"" . $row["image"] . "\", \"" . $row["price"] . "\")'>More Info</button>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "No movies available.";
            }

            $conn->close();
            ?>
        </div>
    </div>

    <footer>
        <div class="footer-container container">
            <div class="content_1">
                <h1>WorkVista.lk</h1>
                <p>The customer is at the heart of our<br>unique business model, which includes<br>design.</p>
            </div>
            <div class="content_2">
                <h4>Dashboard</h4>
                <a href="movies2.php">Jobs</a>
                <a href="nn.html">Our partners</a>
                <a href="signup.php">Login</a>
            </div>
            <div class="content_3">
                <h4>WorkVista.lk</h4>
                <a href="#contact">Contact Us</a>
                <a href="#news" target="_blank">Customers</a>
                <a href="Signup.php" target="_blank">Join</a>
            </div>
            <div class="content_4">
                <h4>NEWSLETTER</h4>
                <p>Stay updated with the latest job opportunities, <br> insights, and career tips on WorkVista.lk!</p>
                <div class="f-mail">
                    <input type="email" placeholder="Your Email">
                    <i class='bx bx-envelope'></i>
                </div>
                <hr>
            </div>
        </div>
        <div class="f-design">
            <div class="f-design-txt container">
                <p>Design and Code by Group 13</p>
            </div>
        </div>
    </footer>

    <script>
        function buyTicketAndRedirect(title, about, image) {
            // Implement your redirection logic here
            alert("Redirecting to buy ticket for " + title);
        }

        function moreInfo(title, about, image, price) {
            // Implement your more info logic here
            alert("More info about " + title);
        }

        document.getElementById('searchInput').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            const movies = document.querySelectorAll('.movie');
            movies.forEach(function (movie) {
                const title = movie.querySelector('.movie-title').textContent.toLowerCase();
                if (title.includes(searchValue)) {
                    movie.style.display = 'block';
                } else {
                    movie.style.display = 'none';
                }
            });
        });

        document.getElementById('filterDropdown').addEventListener('change', function () {
            const filterValue = this.value;
            const movies = document.querySelectorAll('.movie');
            movies.forEach(function (movie) {
                const genre = movie.getAttribute('data-genre');
                if (filterValue === '' || genre === filterValue) {
                    movie.style.display = 'block';
                } else {
                    movie.style.display = 'none';
                }
            });
        });
    </script>
</body>

</html>
