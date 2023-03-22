<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css?v=<?php echo time(); ?>">
    <script src="https://kit.fontawesome.com/f34a5d3160.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <nav>
        <section class="navContainer" id="navContainer">
            <h2>travelPlanner</h2>
            <i class="fa-solid fa-bars" onclick="toggleSideNav()"></i>
            <ul class="navElements">
                <a href="/travelPlanner/index.php" style="color:black;">
                    <h2>Home</h2>
                </a>
                <a href="./postDestination.php" style="color:black;">
                    <h2>Create</h2>
                </a>
                <a href="./signup.php" style="color:black;">
                    <h2>Signup</h2>
                </a>
            </ul>
            <div class="sideNav">
                <ul>
                    <div class="sideNavRow">
                        <i class="fa-solid fa-house-user"></i>
                        <a href="/travelPlanner/index.php" style="color:white;">
                            <li>Home</li>
                        </a>
                    </div>
                    <div class="sideNavRow">
                        <i class="fa-solid fa-plus"></i>
                        <a href="./postDestination.php" style="color:white;">
                            <li>Create</li>
                        </a>
                    </div>
                    <div class="sideNavRow">
                        <i class="fa-solid fa-right-to-bracket"></i>
                        <a href="./signup.php" style="color:white;">
                            <li>Signup</li>
                        </a>
                    </div>
                </ul>
            </div>
        </section>
    </nav>
    <script>
        window.toggleSideNav = function(index) {
            const landmarkDetail = document.getElementById(`navContainer`);
            landmarkDetail.classList.toggle('show');
        }
    </script>