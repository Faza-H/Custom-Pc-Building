// Update this function to store data-id as well
function updateImage(component) {
    const img = document.getElementById(`${component}-img`);
    const input = document.getElementById(component);
    const wattageSpan = document.getElementById(`${component}-wattage`);
    const priceSpan = document.getElementById(`${component}-price`);
    const dataId = localStorage.getItem(`${component}-id`); // Retrieve the data-id from localStorage
    const selectedOption = localStorage.getItem(component);
    const imgUrl = localStorage.getItem(`${component}-img`);
    const wattage = localStorage.getItem(`${component}-wattage`);
    const price = localStorage.getItem(`${component}-price`);

    if (selectedOption && imgUrl && wattage && price) {
        img.src = imgUrl;
        input.value = selectedOption;
        wattageSpan.innerText = `${wattage}W`;
        priceSpan.innerText = `PKR ${price}`;
    }
    updateTotals(); // Update totals after updating the image
}
// Function to handle selecting a component and storing its details in localStorage
function selectComponent(component, name, imgUrl, wattage, price, dataId) {
    // Store component details in localStorage
    localStorage.setItem(component, name);
    localStorage.setItem(`${component}-img`, imgUrl);
    localStorage.setItem(`${component}-wattage`, wattage);
    localStorage.setItem(`${component}-price`, price);
    localStorage.setItem(`${component}-id`, dataId); // Store the data-id
    // Update the component image and details on the builder page
    updateImage(component);
}

// Function to update total wattage and price
function updateTotals() {
    let totalWattage = 0;
    let totalPrice = 0;
    let powerWattage = 0;

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

    document.getElementById('total-wattage').innerText = `${totalWattage}W`;
    document.getElementById('total-price').innerText = `PKR ${totalPrice}`;

    const alertMessage = document.getElementById('alert-message');
    if (totalWattage > powerWattage) {
        alertMessage.style.display = 'block';
        alertMessage.innerText = 'You need a power supply with more capacity.';
    } else {
        alertMessage.style.display = 'none';
    }
}

    // Function to add selected components to the cart
    function addToCart() {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        const components = ['cpu', 'gpu', 'ram', 'ssd', 'case', 'motherboard', 'power'];

        components.forEach(component => {
            const name = localStorage.getItem(component);
            const price = localStorage.getItem(`${component}-price`);
            const dataId = localStorage.getItem(`${component}-id`); // Retrieve data-id

            if (name && price && dataId) {
                cart.push({
                    name: name,
                    price: parseFloat(price),
                    id: dataId  // Include data-id in cart item
                });
            }
        });

        localStorage.setItem('cart', JSON.stringify(cart));
    }

// On page load, update all component images and values from localStorage
window.onload = function() {
    const components = ['cpu', 'gpu', 'ram', 'ssd', 'case', 'motherboard', 'power'];
    components.forEach(component => {
        updateImage(component);
    });

    document.getElementById('build-pc-btn').addEventListener('click', function (e) {
        e.preventDefault();
        addToCart(); // Add selected components to cart
        window.location.href = 'cart.php'; // Redirect to cart page
    });
};
// Reset button to clear local storage and reload the page
document.addEventListener('DOMContentLoaded', function() {
    const resetButton = document.getElementById('reset-button');

    if (resetButton) {
        resetButton.addEventListener('click', function() {
            localStorage.clear();
            location.reload();
        });
    }
});
