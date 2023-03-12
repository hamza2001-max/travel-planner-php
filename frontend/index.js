import { destinationArray } from "./JSON/data.js";

//mapping through the destinations
const destinationContainer = document.getElementById("destinationContainer");
const mappedDestinations = destinationArray.map((destination) => {
    return (
        `<div class="destinationItem" key=${destination.id}
         onclick="redirectToDetail('${destination.id}')">
         <div style="position: relative;">
            <div class="imageWrapper">
                <h3 class="imageWrapperText">Discover ${destination.name}</h3>
            </div>
                <img src=${destination.image} alt=${destination.name} class="destinationImage"/>
            </div>
            <h3 class="destinationItemText">
            ${destination.name} <i class="fa-solid fa-location-dot" style="margin-left:0.6rem;"></i>
            </h3>
        </div>`
    );
});
destinationContainer.innerHTML = mappedDestinations.join('');

//redirecting to another page
window.redirectToDetail = function(id) {
    const url = `destinationDetails.html?id=${id}`;
    window.location.href = url;
}

