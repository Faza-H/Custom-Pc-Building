document.addEventListener('DOMContentLoaded', function() {
  const searchBox = document.getElementById('searchBox');
  const productCards = document.querySelectorAll('.product');

  searchBox.addEventListener('input', function() {
    const query = searchBox.value.toLowerCase();

    productCards.forEach(card => {
      const productName = card.querySelector('h3').textContent.toLowerCase();
      
      card.style.display = productName.includes(query) ? 'block' : 'none';
    });
  });
});
document.addEventListener('DOMContentLoaded', function() {
  const checkboxes = document.querySelectorAll('.sidebar input[type="checkbox"]');
  const products = document.querySelectorAll('.products .product');
  const companySelect = document.getElementById('company-filter');
  const priceSort = document.getElementById('price-sort');
  const productsContainer = document.querySelector('.products');

  function filterProducts() {
    const checkedCategories = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.dataset.category);
  
    const selectedCompany = companySelect.value;
    products.forEach(product => {
      const category = product.dataset.category;
      const company = product.dataset.company;
      const isCategoryMatch = checkedCategories.length === 0 || checkedCategories.includes(category);
      const isCompanyMatch = !selectedCompany || company === selectedCompany;
  
      product.style.display = isCategoryMatch && isCompanyMatch ? 'block' : 'none';
    });
  
    sortProducts();
  }
  function sortProducts() {
    const sortOrder = priceSort.value;
    const filteredProducts = Array.from(productsContainer.querySelectorAll('.product'))
        .filter(product => product.style.display !== 'none');
    
    filteredProducts.sort((a, b) => {
      const priceA = parseFloat(a.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
      const priceB = parseFloat(b.querySelector('h4').textContent.replace(/[^\d\.]/g, ''));
      
      if (sortOrder === 'asc') {
        return priceA - priceB;
      } else {
        return priceB - priceA;
      }
    });
  
    filteredProducts.forEach(product => productsContainer.appendChild(product));
  }
  // Event listeners
  checkboxes.forEach(checkbox => checkbox.addEventListener('change', filterProducts));
  companySelect.addEventListener('change', filterProducts);
  priceSort.addEventListener('change', sortProducts);

  // Initial sort and filter
  filterProducts();
});