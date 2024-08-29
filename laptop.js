// Function to toggle details
function toggleDetails(id) {
    const details = document.getElementById(id);
    details.style.display = details.style.display === 'block' ? 'none' : 'block';
}

// Function to filter products based on search input
function search() {
    const filterText = document.getElementById('find').value.toUpperCase();
    const priceRange = document.getElementById('priceRange').value;
    const checkedVendors = Array.from(document.querySelectorAll('.filters input[type="checkbox"][value]'))
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value.toUpperCase());

    const i3Checkboxes = Array.from(document.querySelectorAll('#i3Details input[type="checkbox"]'))
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value.toLowerCase().replace(/\s+/g, ''));

    const i5Checkboxes = Array.from(document.querySelectorAll('#i5Details input[type="checkbox"]'))
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value.toLowerCase().replace(/\s+/g, ''));

    const i7Checkboxes = Array.from(document.querySelectorAll('#i7Details input[type="checkbox"]'))
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value.toLowerCase().replace(/\s+/g, ''));

    const i9Checkboxes = Array.from(document.querySelectorAll('#i9Details input[type="checkbox"]'))
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value.toLowerCase().replace(/\s+/g, ''));

    const items = document.querySelectorAll('.product');

    items.forEach(item => {
        const nameElement = item.querySelector('h3');
        const priceElement = item.querySelector('h4');
        const descriptionElement = item.querySelector('h5');

        const nameValue = nameElement ? nameElement.textContent.toUpperCase() : '';
        const priceValue = priceElement ? priceElement.textContent.toUpperCase() : '';
        const descriptionValue = descriptionElement ? descriptionElement.textContent.toUpperCase() : '';

        const priceNumber = parseFloat(priceValue.replace(/[^0-9.]/g, ''));
        const isNumericFilter = !isNaN(priceRange);
        const matchesPrice = isNumericFilter && !isNaN(priceNumber) && priceNumber <= priceRange;

        // Check if the product matches the selected vendor filters
        const matchesVendor = checkedVendors.length === 0 || checkedVendors.some(vendor => nameValue.includes(vendor));

        // Check if the product matches the selected generation filters
        const matchesGeneration = (i3Checkboxes.length === 0 || i3Checkboxes.includes(item.id)) &&
            (i5Checkboxes.length === 0 || i5Checkboxes.includes(item.id)) &&
            (i7Checkboxes.length === 0 || i7Checkboxes.includes(item.id)) &&
            (i9Checkboxes.length === 0 || i9Checkboxes.includes(item.id));

        // Display logic
        if (
            (nameValue.indexOf(filterText) > -1 || descriptionValue.indexOf(filterText) > -1) &&
            matchesPrice &&
            matchesVendor &&
            matchesGeneration
        ) {
            item.style.display = "";
        } else {
            item.style.display = "none";
        }
    });
}

// Function to filter products based on price
function filterByPrice() {
    document.getElementById('priceValue').textContent = document.getElementById('priceRange').value;
    search();
}

// Function to filter products based on selected vendor checkboxes
function filterByVendor() {
    search();
}

// Add event listeners
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('priceRange').addEventListener('input', filterByPrice);
    document.querySelectorAll('.filters input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', filterByVendor);
    });
    document.querySelectorAll('#i3Details input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', search);
    });
    document.querySelectorAll('#i5Details input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', search);
    });
    document.querySelectorAll('#i7Details input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', search);
    });
    document.querySelectorAll('#i9Details input[type="checkbox"]').forEach(checkbox => {
        checkbox.addEventListener('change', search);
    });
});