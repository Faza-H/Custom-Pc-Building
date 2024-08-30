function chooseComponent(componentType) {
  // Redirect to components.php with the component type as a query parameter
  window.location.replace('components.php?component=' + componentType);
}

document.addEventListener("DOMContentLoaded", function() {
  // Get URL parameters
  const urlParams = new URLSearchParams(window.location.search);
  const productName = urlParams.get('component');
  const wattage = parseInt(urlParams.get('wattage')) || 0;
  const price = parseInt(urlParams.get('price')) || 0;

  console.log(`Received product info: ${productName}, ${wattage}, ${price}`);

  // Find the table row that matches the component type
  const componentType = productName.split(' ')[0]; // e.g. "Power"
  const rows = document.querySelectorAll('tbody tr');
  
  let tableRowFound = false;
  rows.forEach(row => {
    const cell = row.cells[0].textContent.trim();
    if (cell === componentType) {
      const tableCell = row.cells[1];
      tableCell.innerHTML = `${productName} - ${wattage}W - PKR ${price}<br>`;
      tableRowFound = true;
      console.log(`Updated table cell: ${tableCell.innerHTML}`);
    }
  });

  if (!tableRowFound) {
    console.error(`Table row for ${componentType} not found.`);
  }

  // Store the previously picked entries in an array
  const pickedEntries = JSON.parse(localStorage.getItem('pickedEntries')) || [];
  pickedEntries.push({ component: productName, wattage: wattage, price: price });
  localStorage.setItem('pickedEntries', JSON.stringify(pickedEntries));

  // Calculate the total wattage and price
  const totalWattage = pickedEntries.reduce((acc, entry) => acc + entry.wattage, 0);
  const totalPrice = pickedEntries.reduce((acc, entry) => acc + entry.price, 0);
  
  // Update the total row
  const totalRow = document.querySelector('#total-row');
  if (totalRow) {
    totalRow.innerHTML = `Total Wattage: ${totalWattage}W<br>Total Price: PKR ${totalPrice}<br>`;
  } else {
    console.error('Total row (#total-row) not found.');
  }
});




document.addEventListener("DOMContentLoaded", function() {
  // ... (rest of the code remains the same)

  // Store the previously picked entries in an array
  let pickedEntries = JSON.parse(localStorage.getItem('pickedEntries')) || [];

  // Add a function to reset the picked entries
  function resetPickedEntries() {
    pickedEntries = [];
    localStorage.removeItem('pickedEntries');
  }

  // Call the reset function when the user resets the build
  // (assuming you have a button or event that triggers the reset)
  document.getElementById('reset-button').addEventListener('click', resetPickedEntries);

  // ... (rest of the code remains the same)
});