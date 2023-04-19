window.toggleDropDown = function(index) {
    const dropdownContent = document.getElementById(`dropdownContent${index}`);
    dropdownContent.classList.toggle('show');
}