const overviewBtn = document.getElementById('overviewBtn');
const descriptionBtn = document.getElementById('descriptionBtn');
const overview = document.querySelector('.overview');
const description = document.querySelector('.description');

overviewBtn.addEventListener("click", () => {
    overview.style.display = 'block';
    description.style.display = 'none';
})

descriptionBtn.addEventListener("click", () => {
    overview.style.display = 'none';
    description.style.display = 'block';
})

window.toggleDetail = function(index) {
    console.log("hey");
    const landmarkDetail = document.getElementById(`destinationDetail${index}`);
    landmarkDetail.classList.toggle('show');
}