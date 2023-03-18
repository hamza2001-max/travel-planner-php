import { destinationArray } from "./JSON/data.js";

const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());
const detail = destinationArray.find(({ id }) => id == params.id);

if (detail) {
    const html =
        `<div class="destinationDetailsContainer">
            <div class="imageContainer">
                <img src=${detail.image} alt=${detail.name} class="largeImage"/>
                ${detail.landmarks.map((landmark, index) => {
                    return (`
                    <div>
                        <img src=${landmark.landmarkImage} class="smallImage" onclick="toggleDetail(${index})"/>
                        <div class="landmarkDetails" id="landmarkDetail${index}">
                            <img src=${landmark.landmarkImage} />
                            <div>
                                <li>${landmark.name}</li>
                                <li>${landmark.description}</li>
                            </div>
                        </div>
                    </div>
                    `
                    )}).join("")}
            </div>
            <div class="rightSection">
                <div class="viewButton" >
                    <button id="overviewBtn">Overview</button> / <button id="descriptionBtn">Description</button>
                </div>
                <div class="textContainer overview">
                    <h1 style="margin-bottom: 1.5rem">${detail.name}</h1>
                    <h1>$${detail.price}</h1>
                    <ul class="landmarkList">
                    ${detail.landmarks.map(landmark => {
                        return (`<li>${landmark.name}</li>`)}).join("")}
                    </ul>
                    <button class="bookButton">Book now</button>
                </div>
                <div class="textContainer description" style="display:none;">
                    <p>${detail.description}</p>
                </div>
            </div>
        </div>`
    document.getElementById('destinationDetails').innerHTML = html;
};

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
    const landmarkDetail = document.getElementById(`landmarkDetail${index}`);
    landmarkDetail.classList.toggle('show');
}