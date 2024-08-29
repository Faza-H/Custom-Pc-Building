// script.js

function updateImage(component) {
    const img = document.getElementById(`${component}-img`);
    const input = document.getElementById(component);
    const selectedOption = localStorage.getItem(component);
    const imgUrl = localStorage.getItem(`${component}-img`);

    if (selectedOption && imgUrl) {
        img.src = imgUrl;
        input.value = selectedOption;
    }
}

function selectComponent(component, name, imgUrl) {
    localStorage.setItem(component, name);
    localStorage.setItem(`${component}-img`, imgUrl);
    window.close(); // Close the selection page
}

window.onload = function() {
    const components = ['cpu', 'gpu', 'ram', 'ssd', 'case', 'motherboard'];
    components.forEach(component => {
        updateImage(component);
    });
}
