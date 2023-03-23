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
    <section class="accountWrapper">
        <section class="accountContainer">
            <div class="imageContainer">
                <img src="./staticModels/landingImage.jpg" alt="">
                <div class="blur">
                    <h2>
                        <i class="fa-sharp fa-solid fa-play"></i>Plan and book your trips with ease
                        <span style="color:black;"> with travelPlanner.</span>
                    </h2>
                    <p>join our community.</p>
                </div>
            </div>
            <section class="formContainer">
                <form action="">
                    <div class="accountText">
                        <h2>Welcome to travelPlanner</h2>
                        <h2>Sign in to continue</h2>
                        <p>Already have an account? <a href="/travelPlanner/login.php" style="
                        font-weight: 500; 
                        color:black;
                        text-decoration: underline; ">Login.</a></p>
                    </div>
                    <div class="accountInput">
                        <div>
                            <label for="userName">Username</label>
                            <input type="text" name="userName" id="userName" required>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" required>
                        </div>
                    </div>
                    <button class="accountBtn">Signin</button>
                </form>
            </section>
        </section>
    </section>
</body>

</html>