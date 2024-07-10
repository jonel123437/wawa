<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

// Get the user's name from the session
$name = $_SESSION['name'];
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>7-11</title>
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/home.css">
    </head>
    <body>
        <header>
            <div class="response">
                <button class="menu-button" onclick="toggleMenu()">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </button>
                <div>
                    <input class="search" type="text">
                    <img class="searchicon" src="assets/img/1200px-VisualEditor_-_Icon_-_Search-big_-_white.svg.png" alt="">
                </div>
                <div class="menu" id="menu">
                    <a>Home</a>
                    <a>About</a>
                    <a>Services</a>
                    <a>Contact</a>
                </div>
            </div>
            <img class="banner" src="assets/img/NXTLVL_WEBDEB_711_Banner.png" alt="">
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </header>

        <div class="title" id="home">
            <h1>Welcome, <?php echo htmlspecialchars($name); ?> to Dashboard</h1>
            <button id="logout">Logout</button>
        </div>

        <footer>
            <div class="groupfooter">
                <div>
                    <p class="footertitle">SUSPENDISSE</p>
                    <br>
                    <p class="footerpar">Quisque <br>Faucibus<br>Sapien<br>Hendrerit</p>
                </div>
                <div>
                    <p class="footertitle">PORTA</p>
                    <br>
                    <p class="footerpar">Mauris <br>Suscipit <br>At ipsum <br>Vehicula</p>
                </div>
                <div>
                    <p class="asdasd">FEUGIAT</p>
                    <br>
                    <p class="footerpar">Pellentesque <br>Accumsan <br>Velit in urna <br>Faucibus</p>
                </div>
                <div>
                    <p class="asdasd">PORTA</p>
                    <br>
                    <p class="footerpar">Mauris <br>Suscipit <br>At ipsum <br>Vehicula</p>
                </div>
            </div>
        </footer>
    </body>
    <script>
        document.getElementById('logout').addEventListener('click', function () {
            window.location.href = "login.html"
        })
    </script>
    <script>
        // Populate days
        const daySelect = document.getElementById('daySelect');
        for (let day = 1; day <= 31; day++) {
            const option = document.createElement('option');
            option.value = day;
            option.textContent = day;
            daySelect.appendChild(option);
        }
    
        // Populate months
        const monthSelect = document.getElementById('monthSelect');
        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        months.forEach((month, index) => {
            const option = document.createElement('option');
            option.value = index + 1; // Month value (1-12)
            option.textContent = month;
            monthSelect.appendChild(option);
        });
    
        // Populate years
        const yearSelect = document.getElementById('yearSelect');
        for (let year = 1920; year <= 2024; year++) {
            const option = document.createElement('option');
            option.value = year;
            option.textContent = year;
            yearSelect.appendChild(option);
        }

        
    </script>
    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            var button = document.querySelector(".menu-button");
            menu.style.display = menu.style.display === "flex" ? "none" : "flex";
            button.classList.toggle("active");
        }
    </script>
</html>