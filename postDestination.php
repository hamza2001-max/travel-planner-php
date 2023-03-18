<?php
    if(isset($_POST["publish"])){
        $location = htmlspecialchars($_POST["location"]);
        $price = htmlspecialchars($_POST["price"]); 
        $description = htmlspecialchars($_POST("description"));
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
    <section class="postFormContainer" action="">
        <form>
            <h1 class="formHeading">Submit Your Post</h1>
            <section class="parentInputField">
                <section>
                    <div class="inputField">
                        <label for="location">Location</label>
                        <input id="location" name="location" placeholder="Enter the location" />
                    </div>
                    <div class="inputField">
                        <label for="price">Price</label>
                        <input id="price" name="price" placeholder="Enter the price"  type="number"/>
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
                            <input type="file" accept="image/*" id="mainImage" name="mainImage" />
                        </div>
                    </section>
                    <section class="inputField">
                        <label>Landmark Picture</label>
                        <div class="imageContainer">
                            <label class="imageLabel" id="landmarkImageLabel"><i
                                    class="fa-regular fa-image imageLogo"></i>
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
                            <input type="file" accept="image/*" id="landmarkImages" name="landmarkImages" multiple
                                max="4" />
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
                                <textarea id="fLandmarkDescription" placeholder="Enter the description"
                                    name="firstLandmarkDesc"></textarea>
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
                                <textarea id="sLandmarkDescription" placeholder="Enter the description"
                                    name="secondLandmarkDesc"></textarea>
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
                                <textarea id="tLandmarkDescription" placeholder="Enter the description"
                                    name="thirdLanmarkDesc"></textarea>
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
                                <textarea id="foLandmarkDescription" placeholder="Enter the description"
                                    name="fourthLanmarkDesc"></textarea>
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