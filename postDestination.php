<?php
require_once './includes/database.php';
$formError = "";
$formSuccess = "";

if (isset($_POST["publish"])) {
    $location = $description = $price =  $mainImage =  $mainImage = "";
    $location = htmlspecialchars(trim($_POST["location"]));
    $description = htmlspecialchars(trim($_POST["description"]));
    $price = htmlspecialchars(trim($_POST["price"]));
    $mainImage = $_FILES["mainImage"]["name"];

    $landmarkImages = $_FILES["landmarkImages"]["name"];
    $landmarkTitle = array(
        htmlspecialchars(trim($_POST["firstLandmarkTitle"])),
        htmlspecialchars(trim($_POST["secondLandmarkTitle"])),
        htmlspecialchars(trim($_POST["thirdLandmarkTitle"])),
        htmlspecialchars(trim($_POST["fourthLanmarkTitle"]))
    );
    $landmarkDesc = array(
        htmlspecialchars(trim($_POST["firstLandmarkDesc"])),
        htmlspecialchars(trim($_POST["secondLandmarkDesc"])),
        htmlspecialchars(trim($_POST["thirdLandmarkTitle"])),
        htmlspecialchars(trim($_POST["fourthLanmarkDesc"]))
    );

    if (
        empty($location) || empty($description) || empty($price) || empty($mainImage) ||
        empty($landmarkTitle[0]) || empty($landmarkDesc[0]) || empty($landmarkTitle[1]) ||
        empty($landmarkDesc[1]) || empty($landmarkTitle[2]) || empty($landmarkDesc[2]) ||
        empty($landmarkTitle[3]) || empty($landmarkDesc[3]) || empty($landmarkImages)
    ) {
        $formError = "Please fill all of the fields before publishing";
    } elseif (!preg_match('/^[0-9]*$/', $price)) {
        $formError = "Enter a numeric value for field price";
    } else {
        $sql_query1 = "INSERT INTO destination (dest_name, dest_description, dest_cost, dest_image) VALUES (?, ?, ?, ?)";
        $sql_query2 = "INSERT INTO landmark (land_name, land_description, land_image, dest_name) VALUES (?, ?, ?, ?)";

        if (($stmt1 = mysqli_prepare($connection, $sql_query1)) && ($stmt2 = mysqli_prepare($connection, $sql_query2))) {
            mysqli_stmt_bind_param($stmt1, "ssis", $location, $description, $price, $mainImage);
            mysqli_stmt_execute($stmt1);
            if (mysqli_stmt_affected_rows($stmt1) > 0) {
                $formSuccess = "row affected";
            } else {
                $formError = "Could not submit values";
            }
            $landmarkTotal = count($landmarkImages);
            for ($i = 0; $i < $landmarkTotal; $i++) {
                mysqli_stmt_bind_param($stmt2, "ssss", $landmarkTitle[$i], $landmarkDesc[$i], $landmarkImages[$i], $location);
                mysqli_stmt_execute($stmt2);
                if (mysqli_stmt_affected_rows($stmt2) > 0) {
                    $formSuccess = "row affected";
                    // header("Location: http://localhost/travelPlanner/");
                } else {
                    $formError = "Could not submit values";
                }
            }
            mysqli_stmt_close($stmt1);
            mysqli_stmt_close($stmt2);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <script src="https://kit.fontawesome.com/f34a5d3160.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <section class="postFormContainer">
        <form action="" action="" method="post" enctype="multipart/form-data">
            <h1 class="formHeading">Submit Your Post</h1>
            <?= $formError ?>
            <?= $formSuccess ?>
            <section class="parentInputField">
                <section>
                    <div class="inputField">
                        <label for="location">Location</label>
                        <input id="location" name="location" placeholder="Enter the location" />
                    </div>
                    <div class="inputField">
                        <label for="price">Price</label>
                        <input id="price" name="price" placeholder="Enter the price" type="number" pattern="[0-9]*" />
                    </div>
                    <div class="inputField descInputField">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" placeholder="Enter the description"></textarea>
                    </div>
                    <section class="inputField">
                        <label>Main Picture</label>
                        <div class="imageContainer">
                            <label class="imageLabel" id="mainImageLabel"><i class="fa-regular fa-image imageLogo"></i>
                                Upload the main picture SVG, PNG, JPG etc</label>
                            <img id="mainUploadPreview" />
                            <label for="mainImage" class="imageUpload">
                                Browse
                            </label>
                            <input type="file" id="mainImage" name="mainImage" />
                        </div>
                    </section>
                    <section class="inputField">
                        <label>Landmark Picture</label>
                        <div class="imageContainer">
                            <label class="imageLabel" id="landmarkImageLabel"><i class="fa-regular fa-image imageLogo"></i>
                                Upload four landmark pictures SVG, PNG, JPG etc</label>
                            <div class="landmarkUploadPreview">
                                <img id="landmarkUploadPreview0" />
                                <img id="landmarkUploadPreview1" />
                                <img id="landmarkUploadPreview2" />
                                <img id="landmarkUploadPreview3" />
                            </div>
                            <label for="landmarkImages" class="imageUpload">
                                Browse
                            </label>
                            <input type="file" accept="image/*" id="landmarkImages" name="landmarkImages[]" multiple max="4" />
                        </div>
                    </section>
                </section>
                <section>
                    <section>
                        <div class="landmarkContainer">
                            <div class="inputField">
                                <label for="fLandmarkTitle">Title</label>
                                <input id="fLandmarkTitle" placeholder="First landmark" name="firstLandmarkTitle" />
                            </div>
                            <div class="inputField landmarkDescription">
                                <label for="fLandmarkDescription">Description</label>
                                <textarea id="fLandmarkDescription" placeholder="Enter the description" name="firstLandmarkDesc"></textarea>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="landmarkContainer">
                            <div class="inputField">
                                <label for="sLandmarkTitle">Title</label>
                                <input id="sLandmarkTitle" placeholder="Second landmark" name="secondLandmarkTitle" />
                            </div>
                            <div class="inputField landmarkDescription">
                                <label for="sLandmarkDescription">Description</label>
                                <textarea id="sLandmarkDescription" placeholder="Enter the description" name="secondLandmarkDesc"></textarea>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="landmarkContainer">
                            <div class="inputField">
                                <label for="tLandmarkTitle">Title</label>
                                <input id="tLandmarkTitle" placeholder="Third landmark" name="thirdLandmarkTitle" />
                            </div>
                            <div class="inputField landmarkDescription">
                                <label for="tLandmarkDescription">Description</label>
                                <textarea id="tLandmarkDescription" placeholder="Enter the description" name="thirdLanmarkDesc"></textarea>
                            </div>
                        </div>
                    </section>
                    <section>
                        <div class="landmarkContainer">
                            <div class="inputField">
                                <label for="foLandmarkTitle">Title</label>
                                <input id="foLandmarkTitle" placeholder="Fourth landmark" name="fourthLanmarkTitle" />
                            </div>
                            <div class="inputField landmarkDescription">
                                <label for="foLandmarkDescription">Description</label>
                                <textarea id="foLandmarkDescription" placeholder="Enter the description" name="fourthLanmarkDesc"></textarea>
                            </div>
                        </div>
                    </section>
                </section>
            </section>
            <button type="submit" id="publish" name="publish">Publish</button>
        </form>
    </section>
</body>
<script type="module" src="postDestination.js"></script>

</html>