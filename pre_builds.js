document.addEventListener('DOMContentLoaded', () => {
    console.log('Script running...');
    
  
    const priceFilter = document.getElementById('price-filter');
  
    priceFilter.addEventListener('change', function() {
      console.log('Price filter changed...');
  
      const selectedRange = this.value;
      console.log(`Selected range: ${selectedRange}`);
  
      const products = document.querySelectorAll('.product-container');
  
      let minPrice = 0, maxPrice = Infinity;
  
      if (selectedRange) {
        [minPrice, maxPrice] = selectedRange.split('-').map(Number);
      }
  
      console.log(`Filtering products in the range: ${minPrice} - ${maxPrice}`);
  
      products.forEach(product => {
        const priceText = product.querySelector('.product-left h4').textContent;
        const price = parseInt(priceText.replace(/[^0-9]/g, ''), 10);
  
        console.log(`Product price: ${priceText} (Parsed: ${price})`);
  
        if (selectedRange) {
          if (price >= minPrice && price <= maxPrice) {
            product.style.display = 'block'; // Show product
          } else {
            product.style.display = 'none'; // Hide product
          }
        } else {
          product.style.display = 'block'; // Show all products if no filter selected
        }
      });
    });
  });
  function search() {
    const searchTerm = document.getElementById('find').value.toLowerCase();
    const productContainers = document.querySelectorAll('.product-container');
  
    productContainers.forEach((container) => {
      const featureBlocks = container.querySelectorAll('.feature-block');
      let matches = false;
  
      featureBlocks.forEach((block) => {
        const paragraphText = block.querySelector('p').textContent.toLowerCase();
        if (paragraphText.includes(searchTerm)) {
          matches = true;
        }
      });
  
      if (matches) {
        container.style.display = 'block';
      } else {
        container.style.display = 'none';
      }
    });
  }



  document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('rating-filter').addEventListener('change', function() {
        const order = this.value;
        sortProductsByRating(order);
    });

    function sortProductsByRating(order) {
        // Get all product containers
        const products = Array.from(document.querySelectorAll('.product-container'));

        // Sort products based on rating
        products.sort((a, b) => {
            // Extract numeric rating from the text content
            const ratingA = parseFloat(a.querySelector('.product-left h5').textContent.split(':')[1].split('/')[0].trim());
            const ratingB = parseFloat(b.querySelector('.product-left h5').textContent.split(':')[1].split('/')[0].trim());

            if (order === 'asc') {
                return ratingA - ratingB;
            } else if (order === 'des') {
                return ratingB - ratingA;
            }
            return 0; // No sorting
        });

        // Find the container to reattach sorted products
        const container = document.querySelector('.product-container');

        // Check if container exists
        if (container) {
            // Assuming you want to replace the current content with sorted products
            const parent = container.parentNode;
            products.forEach(product => parent.appendChild(product));
        } else {
            console.error('Container for products not found.');
        }
    }
});

