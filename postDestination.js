const mainImage = document.getElementById('mainImage');
const landmarkImages = document.getElementById('landmarkImages');

mainImage.addEventListener('change', () => {
    const imageReader = new FileReader();
    imageReader.readAsDataURL(document.getElementById('mainImage').files[0]);
    imageReader.onload = function (event) {
        document.getElementById('mainUploadPreview').src = event.target.result;
        document.getElementById('mainImageLabel').style.display = 'none';
        document.getElementById('mainUploadPreview').style.display = 'block';
    }
});

landmarkImages.addEventListener('change', () => {
    for (let i = 0; i < 4; i++) {
        const imageReader = new FileReader();
        imageReader.readAsDataURL(document.getElementById('landmarkImages').files[i]);
        imageReader.onload = function (event) {
            document.getElementById(`landmarkUploadPreview${i}`).src = event.target.result;
            document.getElementById(`landmarkImageLabel`).style.display = 'none';
            document.querySelector(`.landmarkUploadPreview`).style.display = 'grid';
        }
    }
});