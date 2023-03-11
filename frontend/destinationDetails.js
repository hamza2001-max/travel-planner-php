const urlSearchParams = new URLSearchParams(window.location.search);
const params = Object.fromEntries(urlSearchParams.entries());
document.getElementById('detailImage').src = params.image;
document.getElementById('detailName').innerHTML = params.name;
document.getElementById('detailDescription').innerHTML = params.description;
document.getElementById('detailPrice').innerHTML = params.price;
