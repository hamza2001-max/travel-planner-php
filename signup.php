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
    <section class="signupContainer">
        <div class="imageContainer">
            <img src="./staticModels/landingImage.jpg" alt="">
            <div class="blur">
                <h1>
                    <i class="fa-sharp fa-solid fa-play"></i>Plan and book your trips with ease
                    <span style="color:black;"> with travelPlanner.</span>
                </h1>
                <p>join our community.</p>
            </div>
        </div>
        <form action="">
            <div class="signupText">
                <h1>Welcome to travelPlanner</h1>
                <h1>Sign in to continue</h1>
                <p>Already have an account? <a href="/travelPlanner/login.php" style="font-weight: 500; 
                color:black;
                text-decoration: underline; ">Login.</a></p>
            </div>
            <div class="signupInput">
                <div>
                    <label for="userName">Username</label>
                    <input type="text" name="userName" id="userName" required>
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" required>
                </div>
            </div>
            <button class="signupBtn">Signin</button>
        </form>
    </section>
</body>

</html>