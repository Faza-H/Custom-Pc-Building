document.addEventListener('DOMContentLoaded', function () {
  const searchBox = document.getElementById('searchBox');
  const productCards = document.querySelectorAll('.product');

  // Search functionality
  searchBox.addEventListener('input', function () {
      const query = searchBox.value.toLowerCase();

      productCards.forEach(card => {
          const productName = card.querySelector('h3').textContent.toLowerCase();
          card.style.display = productName.includes(query) ? 'block' : 'none';
      });
  });
});

document.addEventListener('DOMContentLoaded', function () {
  const checkboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
  const products = document.querySelectorAll('.products .product');
  const companySelect = document.getElementById('company-filter');
  const priceSort = document.getElementById('price-sort');
  const productsContainer = document.querySelector('.products');

  // Function to filter products
  function filterProducts() {
      const checkedCategories = Array.from(checkboxes)
          .filter(checkbox => checkbox.checked)
          .map(checkbox => checkbox.dataset.category);

      const selectedCompany = companySelect.value;

      // Determine if 'top_seller' is selected
      const isTopSellerSelected = checkedCategories.includes('top_seller');

      // Determine other selected categories excluding 'top_seller'
      const otherSelectedCategories = checkedCategories.filter(cat => cat !== 'top_seller');

      products.forEach(product => {
          const productCategories = product.dataset.category.split(',').map(cat => cat.trim());
          const company = product.dataset.company;

          let isMatch = true;

          // Company filter
          if (selectedCompany && company !== selectedCompany) {
              isMatch = false;
          }

          // Category filter
          if (isTopSellerSelected) {
              if (otherSelectedCategories.length > 0) {
                  // 'Top Seller' and specific categories selected
                  const hasTopSeller = productCategories.includes('top_seller');
                  const hasSelectedCategory = otherSelectedCategories.some(cat => productCategories.includes(cat));

                  isMatch = isMatch && hasTopSeller && hasSelectedCategory;
              } else {
                  // Only 'Top Seller' selected
                  const hasTopSeller = productCategories.includes('top_seller');
                  isMatch = isMatch && hasTopSeller;
              }
          } else {
              if (otherSelectedCategories.length > 0) {
                  const hasSelectedCategory = otherSelectedCategories.some(cat => productCategories.includes(cat));
                  isMatch = isMatch && hasSelectedCategory;
              }
              // If no categories are selected and 'Top Seller' is not selected, show all products
          }

          product.style.display = isMatch ? 'block' : 'none';
      });

      sortProducts(isTopSellerSelected && otherSelectedCategories.length > 0 ? otherSelectedCategories[0] : null);
  }

  // Function to sort products by price, and prioritize top sellers in specific categories
  function sortProducts(priorityCategory = null) {
      const sortOrder = priceSort.value;
      let filteredProducts = Array.from(productsContainer.querySelectorAll('.product'))
          .filter(product => product.style.display !== 'none');

      if (priorityCategory) {
          // Separate products into priority and others
          let priorityProducts = filteredProducts.filter(product => {
              const productCategories = product.dataset.category.split(',').map(cat => cat.trim());
              return productCategories.includes('top_seller') && productCategories.includes(priorityCategory);
          });

          let otherProducts = filteredProducts.filter(product => {
              const productCategories = product.dataset.category.split(',').map(cat => cat.trim());
              return !(productCategories.includes('top_seller') && productCategories.includes(priorityCategory));
          });

          // Sort priority products by price
          priorityProducts.sort((a, b) => {
              const priceA = parseFloat(a.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
              const priceB = parseFloat(b.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
              return sortOrder === 'asc' ? priceA - priceB : priceB - priceA;
          });

          // Sort other products by price
          otherProducts.sort((a, b) => {
              const priceA = parseFloat(a.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
              const priceB = parseFloat(b.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
              return sortOrder === 'asc' ? priceA - priceB : priceB - priceA;
          });

          // Combine priority and other products
          filteredProducts = [...priorityProducts, ...otherProducts];
      } else {
          // Sort normally
          filteredProducts.sort((a, b) => {
              const priceA = parseFloat(a.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
              const priceB = parseFloat(b.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
              return sortOrder === 'asc' ? priceA - priceB : priceB - priceA;
          });
      }

      // Re-append sorted products
      filteredProducts.forEach(product => productsContainer.appendChild(product));
  }

  // Event listeners
  checkboxes.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
  companySelect.addEventListener('change', filterProducts);
  priceSort.addEventListener('change', sortProducts);

  // Initial filter and sort
  filterProducts();
});
