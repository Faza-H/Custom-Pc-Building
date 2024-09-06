let cartItems = [];
let total = 0;

function openCart() {
    document.getElementById("cartSidebar").style.width = "300px";
}

function closeCart() {
    document.getElementById("cartSidebar").style.width = "0";
}

function addToCart(button) {
    const productElement = button.parentElement;
    const productName = productElement.querySelector("h3").innerText;
    
    // Remove "₨" and any spaces before parsing the price
    const productPrice = parseFloat(productElement.querySelector("h4").innerText.replace("₨", "").trim());

    if (!isNaN(productPrice)) {
        cartItems.push({ name: productName, price: productPrice });
        total += productPrice;
        updateCart();
    } else {
        console.error("Failed to parse product price:", productElement.querySelector("h4").innerText);
    }
}

function updateCart() {
    const cartItemsContainer = document.getElementById("cartItems");
    cartItemsContainer.innerHTML = ""; // Clear previous items

    // Loop through the cartItems array to display items and a remove button for each
    cartItems.forEach((item, index) => {
        const itemElement = document.createElement("div");
        itemElement.className = "product-item d-flex justify-content-between align-items-center";

        // Create the cart item HTML with the remove button
        itemElement.innerHTML = `
            <span>${item.name} - ₨${item.price.toFixed(2)}</span>
            <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">&times;</button>
        `;
        
        // Append the item to the cart container
        cartItemsContainer.appendChild(itemElement);
    });

    // Update the total price and cart badge
    document.getElementById("cartTotal").innerText = `₨${total.toFixed(2)}`;
    document.querySelector(".cart-btn .badge").innerText = cartItems.length;
}

function removeFromCart(index) {
    // Remove the selected item from the cart array and adjust the total
    total -= cartItems[index].price;
    cartItems.splice(index, 1); // Remove the item at the given index

    // Update the cart display
    updateCart();
}

function buyNow() {
    // Store cart items and total in localStorage
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    localStorage.setItem("cartTotal", total.toFixed(2));
    // Redirect to the shipping page
    window.location.href = "shipping.php";
}
