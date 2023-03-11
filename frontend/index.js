//json data
const destinationArray = [
    {
        id: 0, name: 'Malaysia', image: './staticModels/malaysia.jpg', price: 572,
        description: "Malaysia is a beautiful Southeast Asian country located on the Malay Peninsula and the island of Borneo. It is a diverse country, known for its mix of modern cities, stunning natural landscapes, rich culture, and delicious cuisine."
    },
    // { id: 1, name: 'Russia', image: './staticModels/russia.jpg' },
    // { id: 2, name: 'South Korea', image: './staticModels/korea.jpg' },
    // { id: 3, name: 'Mongolia', image: './staticModels/mongolia.jpg' },
    // { id: 4, name: 'Italy', image: './staticModels/italy.jpg' },
    // { id: 5, name: 'Peru', image: './staticModels/peru.jpg' },
    // { id: 6, name: 'Brazil', image: './staticModels/brazil.jpg' },
    // { id: 7, name: 'Argentina', image: './staticModels/argentina.jpg' },
    // { id: 8, name: 'South Africa', image: './staticModels/southAfrica.jpg' },
    // { id: 9, name: 'Thailand', image: './staticModels/thailand.jpg' }
];

//index.html's js
//mapping through the destinations
const destinationContainer = document.getElementById("destinationContainer");
const mappedDestinations = destinationArray.map((destination) => {
    return (
        `<div class="destinationItem" key=${destination.id}
         onclick="redirectToDetail('${destination.name}', '${destination.image}', '${destination.description}', '${destination.price}')">
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
function redirectToDetail(name, image, description, price) {
    const url = `destinationDetails.html?name=${name}&image=${image}&description=${description}&price=${price}`;
    window.location.href = url;
}

//destinationDetail's js
