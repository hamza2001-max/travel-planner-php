<?php
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $image = $_FILES["image"];
    $imagePath = $image["full_path"];

    $target_dir = "staticModels/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
        echo "<img src=$target_file />";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" style="width: 30rem;  display: flex; flex-direction: column;">
        <h1>name</h1>
        <input name="name" />
        <input type="file" name="image" />
        <button type="submit" name="submit">sumbit</button>
    </form>
</body>

</html>