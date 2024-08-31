function chooseComponent(componentType) {
  // Redirect to components.php with the component type as a query parameter
  window.location.replace('components.php?component=' + componentType);
}

document.addEventListener("DOMContentLoaded", function() {
  // Get URL parameters
  const urlParams = new URLSearchParams(window.location.search);
  const productId = urlParams.get('product_id');
  const productName = urlParams.get('component');
  const wattage = parseInt(urlParams.get('wattage')) || 0;
  const price = parseInt(urlParams.get('price')) || 0;
  const imageUrl = urlParams.get('image_url');

  console.log(`Received product info: ${productName}, ${wattage}, ${price}, ${productId}, ${imageUrl}`);

  // Find the table row that matches the component type
  let componentId;
  switch (productName.split(' ')[0]) {
    case 'CPU':
      componentId = 'cpu';
      break;
    case 'Motherboard':
      componentId = 'Motherboard';
      break;
    case 'RAM':
      componentId = 'RAM';
      break;
    case 'SSD':
      componentId = 'SSD';
      break;
    case 'GPU':
      componentId = 'gpu';
      break;
    case 'Casing':
      componentId = 'Casing';
      break;
    case 'Power':
      componentId = 'Power_supply';
      break;
    default:
      console.error(`Unknown component type: ${productName}`);
      return;
  }

  const componentCell = document.getElementById(`${componentId}-price`);
  if (componentCell) {
    componentCell.innerHTML = `
      <img src="${imageUrl}" alt="${productName}" style="width: 50px; height: auto;"><br>
      ${productName} - ${wattage}W - PKR ${price}<br>
      ID: ${productId}
    `;
  } else {
    console.error(`Table cell for ${componentId} not found.`);
  }

  // Store the previously picked entries in an array
  const pickedEntries = JSON.parse(localStorage.getItem('pickedEntries')) || [];
  pickedEntries.push({ id: productId, component: productName, wattage: wattage, price: price, imageUrl: imageUrl });
  localStorage.setItem('pickedEntries', JSON.stringify(pickedEntries));

  // Calculate the total wattage and price
  const totalWattage = pickedEntries.reduce((acc, entry) => acc + entry.wattage, 0);
  const totalPrice = pickedEntries.reduce((acc, entry) => acc + entry.price, 0);
  
  // Update the total row
  const totalRow = document.getElementById('total-price');
  if (totalRow) {
    totalRow.innerHTML = `Total Wattage: ${totalWattage}W<br>Total Price: PKR ${totalPrice}<br>`;
  } else {
    console.error('Total row (#total-price) not found.');
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