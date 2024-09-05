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
        wattageSpan.innerText = `${wattage}W`; // Display wattage only
        priceSpan.innerText = `PKR ${price}`; // Force PKR instead of $
    } else {
        console.log(`Not updating image for ${component} because one or more values are missing`);
    }
    updateTotals(); // Update totals after updating the image
}

function selectComponent(component, name, imgUrl, wattage, price) {
    const numericPrice = price.replace(/[^0-9.-]+/g, ""); // Remove any non-numeric characters including "$"
    localStorage.setItem(component, name);
    localStorage.setItem(`${component}-img`, imgUrl);
    localStorage.setItem(`${component}-wattage`, wattage);
    localStorage.setItem(`${component}-price`, numericPrice); // Store only the numeric price
    console.log(`Selected component: ${component}`);
    console.log(`Name: ${name}`);
    console.log(`Image URL: ${imgUrl}`);
    console.log(`Wattage: ${wattage}`);
    console.log(`Price: ${numericPrice}`);
    updateImage(component); // Call updateImage after setting local storage items
    window.location.replace('builder.php'); // Redirect to builder page
}

function updateTotals() {
    let totalWattage = 0;
    let totalPrice = 0;
    let powerWattage = 0;
    
    // List of all components
    const components = ['cpu', 'gpu', 'ram', 'ssd', 'case', 'motherboard', 'power'];

    components.forEach(component => {
        const wattage = localStorage.getItem(`${component}-wattage`);
        const price = localStorage.getItem(`${component}-price`);

        if (component !== 'power' && wattage) {
            totalWattage += parseInt(wattage);
        }

        if (price) {
            totalPrice += parseFloat(price);
        }

        if (component === 'power' && wattage) {
            powerWattage = parseInt(wattage);
        }
    });

    // Update total wattage and total price fields
    document.getElementById('total-wattage').innerText = `${totalWattage}W`;
    document.getElementById('total-price').innerText = `PKR ${totalPrice}`;

    // Show message if total wattage exceeds power supply wattage
    const alertMessage = document.getElementById('alert-message');
    if (totalWattage > powerWattage) {
        alertMessage.style.display = 'block';
        alertMessage.innerText = 'You need a power supply with more capacity.';
    } else {
        alertMessage.style.display = 'none'; // Hide message if not needed
    }
}

window.onload = function() {
    const components = ['cpu', 'gpu', 'ram', 'ssd', 'case', 'motherboard', 'power'];
    components.forEach(component => {
        updateImage(component);
    });
}
