const destinationArray = [
    { name: 'Malaysia', image: './staticModels/malaysia.jpg' },
    { name: 'Russia', image: './staticModels/russia.jpg' },
    { name: 'South Korea', image: './staticModels/korea.jpg' },
    { name: 'Mongolia', image: './staticModels/mongolia.jpg' },
    { name: 'Italy', image: './staticModels/italy.jpg' },
    { name: 'Peru', image: './staticModels/peru.jpg' },
    { name: 'Brazil', image: './staticModels/brazil.jpg' },
    { name: 'Argentina', image: './staticModels/argentina.jpg' },
    { name: 'South Africa', image: './staticModels/southAfrica.jpg' },
    { name: 'Thailand', image: './staticModels/thailand.jpg' }
];

const destinationContainer = document.getElementById("destinationContainer");

const mappedDestinations = destinationArray.map((destination, index) => {
    return (
        `<div class="destinationItem" key=${index}>
            <img src=${destination.image} alt=${destination.name} class="destinationImage"/>
            <h3 style="font-weight: 400;
             margin-top: 0.7rem; 
             display:flex; 
             align-items:center;">
             ${destination.name} <i class="fa-solid fa-location-dot" style="margin-left:0.6rem;
             font-size:0.9rem;"></i>
             </h3>
        </div>`
    );
});
destinationContainer.innerHTML = mappedDestinations.join('');

