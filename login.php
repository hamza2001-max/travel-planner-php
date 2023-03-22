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
<form action="">
        <div>
            <h1>Welcome to travelPlanner</h1>
            <h1>Login to continue</h1>
            <p>Don't have an account? <a href="/travelPlanner/signup.php">Signup.</a></p>
        </div>
        <div>
            <label for="">Username</label>
            <input type="text" name="userName" requied>
            <label for="">Password</label>
            <input type="password" name="password" required>
        </div>
        <button>Login</button>
    </form>
</body>
</html>