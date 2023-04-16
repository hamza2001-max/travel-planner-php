<?php
require_once './includes/database.php';
?>
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
            <a href="/travelPlanner/index.php" style="color:black;">
                <h2>travelPlanner</h2>
            </a>
            <i class="fa-solid fa-bars" onclick="toggleSideNav()"></i>
            <ul class="navElements">
                <a href="/travelPlanner/index.php" style="color:black;">
                    <h2>Home</h2>
                </a>
                <?php
                if (isset($_SESSION['admin'])) { ?>
                    <a href="./postDestination.php" style="color:black;">
                        <h2>Create</h2>
                    </a>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['user'])) { ?>
                    <a href="./bookedDestinations.php" style="color:black;">
                        <h2>Booked</h2>
                    </a>
                <?php
                }
                ?>
                <?php
                if (isset($_SESSION['user']) or isset($_SESSION['admin'])) {
                ?>
                    <a href="./logout.php" style="color:black;">
                        <h2>Logout</h2>
                    </a>
                <?php
                } else {
                ?>
                    <a href="./admin.php" style="color:black;">
                        <h2>Admin</h2>
                    </a>
                    <a href="./signup.php" style="color:black;">
                        <h2>Signup</h2>
                    </a>
                    <a href="./login.php" style="color:black;">
                        <h2>Login</h2>
                    </a>
                <?php
                }
                ?>
            </ul>
            <div class="sideNav">
                <ul>
                    <div class="sideNavRow">
                        <i class="fa-solid fa-house-user"></i>
                        <a href="/travelPlanner/index.php" style="color:white;">
                            <li>Home</li>
                        </a>
                    </div>
                    <?php
                    if (isset($_SESSION['admin'])) { ?>
                        <div class="sideNavRow">
                            <i class="fa-solid fa-plus"></i>
                            <a href="./postDestination.php" style="color:white;">
                                <li>Create</li>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['user'])) { ?>
                         <div class="sideNavRow">
                         <i class="fa-sharp fa-solid fa-bookmark"></i>
                            <a href="./bookedDestinations.php" style="color:white;">
                                <li>Booked</li>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['user']) or isset($_SESSION['admin'])) {
                    ?>
                        <div class="sideNavRow">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <a href="./logout.php" style="color:white;">
                                <li>Logout</li>
                            </a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="sideNavRow">
                            <i class="fa-solid fa-user"></i>
                            <a href="./admin.php" style="color:white;">
                                <li>Admin</li>
                            </a>
                        </div>
                        <div class="sideNavRow">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <a href="./login.php" style="color:white;">
                                <li>Login</li>
                            </a>
                        </div>
                        <div class="sideNavRow">
                            <i class="fa-solid fa-right-to-bracket"></i>
                            <a href="./signup.php" style="color:white;">
                                <li>Signup</li>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
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