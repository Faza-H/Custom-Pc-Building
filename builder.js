// script.js

function updateImage(component) {
    const img = document.getElementById(`${component}-img`);
    const input = document.getElementById(component);
    const wattageSpan = document.getElementById(`${component}-wattage`);
    const priceSpan = document.getElementById(`${component}-price`);
    const selectedOption = localStorage.getItem(component);
    const imgUrl = localStorage.getItem(`${component}-img`);
    const wattage = localStorage.getItem(`${component}-wattage`);
    const price = localStorage.getItem(`${component}-price`);

    console.log(`Updating image for ${component}`);
    console.log(`Selected option: ${selectedOption}`);
    console.log(`Image URL: ${imgUrl}`);
    console.log(`Wattage: ${wattage}`);
    console.log(`Price: ${price}`);

    if (selectedOption && imgUrl && wattage && price) {
        img.src = imgUrl;
        input.value = selectedOption;
        wattageSpan.innerText = `Wattage: ${wattage}W`;
        priceSpan.innerText = `Price: $${price}`;
    } else {
        console.log(`Not updating image for ${component} because one or more values are missing`);
    }
}

function selectComponent(component, name, imgUrl, wattage, price) {
    localStorage.setItem(component, name);
    localStorage.setItem(`${component}-img`, imgUrl);
    localStorage.setItem(`${component}-wattage`, wattage);
    localStorage.setItem(`${component}-price`, price);
    console.log(`Selected component: ${component}`);
    console.log(`Name: ${name}`);
    console.log(`Image URL: ${imgUrl}`);
    console.log(`Wattage: ${wattage}`);
    console.log(`Price: ${price}`);
    updateImage(component); // Call updateImage after setting local storage items
    window.close(); // Close the selection page
}

window.onload = function() {
    const components = ['cpu', 'gpu', 'ram', 'ssd', 'case', 'motherboard', 'power'];
    components.forEach(component => {
        updateImage(component);
    });
}