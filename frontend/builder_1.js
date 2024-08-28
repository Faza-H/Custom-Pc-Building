function chooseComponent(component) {
    // Redirect to your store page
    window.location.href = `/components.html?component=${component}`;
}

// On your store page, handle selection and redirect back to builder
function selectComponent(component, wattage) {
    // Save the selection, for example in localStorage
    localStorage.setItem(component, wattage);

    // Redirect back to the builder page
    window.location.href = `/builder_1.html`;
}

// On the builder page, calculate the total wattage
window.onload = function() {
    const components = ['cpu', 'motherboard', 'ram', 'storage', 'gpu', 'case', 'power-supply'];
    let totalWattage = 0;

    components.forEach(component => {
        const wattage = localStorage.getItem(component);
        if (wattage) {
            totalWattage += parseInt(wattage);
            // Update the selection text (you may need to adjust this based on your actual UI)
            document.querySelector(`button[onclick="chooseComponent('${component}')"]`).innerText = `✔ Component Selected (${wattage}W)`;
        }
    });

    document.getElementById('wattage').innerText = `${totalWattage}W`;
};
