const motherboardCompatibility = {
    "ASUS B650M S2H Motherboard": {
        compatibleCPUs: ["AMD Ryzen 7 7800X", "AMD Ryzen 9 9900X"],
        compatibleGPUs: ["AMD RX 5700 XT 8G", "AMD RX 7900 24G", "Radeon RX 6800", "Nvidia RTX™ 3090 Ti 24G", "Nvidia RTX™ 2080 Ti 16G", "Nvidia RTX™ 4060 Ti 16G", "Nvidia RTX™ 4070 Ti 16G", "Nvidia GTX 1660 Ti 6G", "Nvidia RTX™ 3080"],
        message: "It's compatible only with AMD Ryzen 9000, 8000, and 7000 series processors and 40 Series, 30 Series, 20 Series, 16 Series Nvidia GPU and 7000, 6000, 5000 Series AMD GPU."
    },
    "Intel B760M D3HP Motherboard": {
        compatibleCPUs: ["Intel Core i7 12820X 12th Gen", "Intel Core i9 14th Gen"],
        compatibleGPUs: ["AMD RX 5700 XT 8G", "AMD RX 7900 24G", "Radeon RX 6800", "Nvidia RTX™ 3090 Ti 24G", "Nvidia RTX™ 2080 Ti 16G", "Nvidia RTX™ 4060 Ti 16G", "Nvidia RTX™ 4070 Ti 16G", "Nvidia GTX 1660 Ti 6G", "Nvidia RTX™ 3080"],
        message: "It's compatible with Intel 12th gen, 13th, and 14th processors, doesn't support Ryzen processors, and 40 Series, 30 Series, 20 Series, 16 Series Nvidia GPU and 7000, 6000, 5000 Series AMD GPU."
    },
    "Intel X299 AORUS Gaming 7 Motherboard": {
        compatibleCPUs: ["Intel Core i7 12820X 12th Gen"],
        compatibleGPUs: ["AMD RX 5700 XT 8G", "AMD RX 7900 24G", "AMD RX VEGA 64", "AMD RX 580", "Radeon RX 6800", "Nvidia RTX™ 3090 Ti 24G", "Nvidia GTX 1080 Ti 11G", "Nvidia RTX™ 2080 Ti 16G", "Nvidia RTX™ 4060 Ti 16G", "Nvidia RTX™ 4070 Ti 16G", "Nvidia GTX 1660 Ti 6G", "Nvidia RTX™ 3080"],
        message: "It's compatible with the X series CPU, doesn't support Ryzen processors, and is compatible with 40, 30, 20, 16, 10 Series Nvidia GPUs and 7000, 6000, 5000 Series, Vega, and 500 Series AMD GPUs."
    },
    "MSI B550M Motherboard": {
        compatibleCPUs: ["AMD Ryzen 3 3200G 4-Core", "AMD Ryzen 5 3600", "Intel Core i3 6th Gen", "Intel Core i5 5th Gen", "Intel Core i7 10th Gen"],
        compatibleGPUs: ["AMD RX VEGA 64", "AMD RX 580", "Nvidia GTX 1080 Ti 11G", "Nvidia RTX™ 2080 Ti 16G", "Nvidia GTX 1660 Ti 6G"],
        message: "Compatible with mid-range Intel and Ryzen processors (5th to 9th gen), and supports 10 Series, 16 Series Nvidia GPUs and RX, Vega Series AMD GPUs."
    },
    "AMD X870E AORUS MASTER Motherboard": {
        compatibleCPUs: ["AMD Ryzen 7 7800X", "AMD Ryzen 9 9900X"],
        compatibleGPUs: ["AMD RX 5700 XT 8G", "AMD RX 7900 24G", "Radeon RX 6800", "Nvidia RTX™ 3090 Ti 24G", "Nvidia RTX™ 2080 Ti 16G", "Nvidia RTX™ 4060 Ti 16G", "Nvidia RTX™ 4070 Ti 16G", "Nvidia GTX 1660 Ti 6G", "Nvidia RTX™ 3080"],
        message: "Compatible with AMD Ryzen 9000, 8000, 7000 Series processors and Nvidia 40 Series, 30 Series, 20 Series, 16 Series GPUs, and AMD 7000, 6000, 5000 Series GPUs."
    },
    "Gigabyte B450M Motherboard": {
        compatibleCPUs: ["AMD Ryzen 3 3200G 4-Core", "AMD Ryzen 5 3600", "Intel Core i3 6th Gen", "Intel Core i5 5th Gen", "Intel Core i7 10th Gen"],
        compatibleGPUs: ["AMD RX VEGA 64", "AMD RX 580", "Nvidia GTX 1080 Ti 11G", "Nvidia RTX™ 2080 Ti 16G", "Nvidia GTX 1660 Ti 6G"],
        message: "Compatible with mid-range Intel and Ryzen processors (5th to 9th gen), and supports 10 Series, 16 Series Nvidia GPUs and RX, Vega Series AMD GPUs."
    }
};

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
    
    // Check for compatibility when updating CPU, GPU, or Motherboard
    if (component === 'cpu' || component === 'gpu' || component === 'motherboard') {
        checkAllCompatibility();  // Call compatibility check after updating
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

// Function to check compatibility for all components
function checkAllCompatibility() {
    const selectedMotherboard = localStorage.getItem('motherboard');
    const selectedCPU = localStorage.getItem('cpu');
    const selectedGPU = localStorage.getItem('gpu');

    console.log("Checking compatibility...");
    console.log("Selected Motherboard: ", selectedMotherboard);
    console.log("Selected CPU: ", selectedCPU);
    console.log("Selected GPU: ", selectedGPU);

    if (selectedMotherboard && selectedCPU && selectedGPU) {
        checkCompatibility(selectedMotherboard, selectedCPU, selectedGPU);
    }
}

// Compatibility function (as provided)
function checkCompatibility(motherboard, selectedCPU, selectedGPU) {
    const compatibility = motherboardCompatibility[motherboard];
    
    // Check if motherboard compatibility exists
    if (!compatibility) {
        console.log("No compatibility data for motherboard:", motherboard);
        return;
    }

    let isCPUCompatible = compatibility.compatibleCPUs.includes(selectedCPU);
    let isGPUCompatible = compatibility.compatibleGPUs.includes(selectedGPU);

    console.log("CPU Compatible:", isCPUCompatible);
    console.log("GPU Compatible:", isGPUCompatible);

    const alertMessage = document.getElementById('compatibility-alert');
    if (!isCPUCompatible || !isGPUCompatible) {
        alertMessage.style.display = 'block';
        alertMessage.innerText = compatibility.message;
        console.log("Incompatible components found!");
    } else {
        alertMessage.style.display = 'none';
        console.log("All components are compatible.");
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

