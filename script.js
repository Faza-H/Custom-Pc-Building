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
    const productPrice = parseFloat(productElement.querySelector("h4").innerText.replace("$", ""));

    cartItems.push({ name: productName, price: productPrice });
    total += productPrice;

    updateCart();
}

function updateCart() {
    const cartItemsContainer = document.getElementById("cartItems");
    cartItemsContainer.innerHTML = "";

    cartItems.forEach(item => {
        const itemElement = document.createElement("div");
        itemElement.className = "product-item";
        itemElement.innerHTML = `${item.name} - $${item.price.toFixed(2)}`;
        cartItemsContainer.appendChild(itemElement);
    });

    document.getElementById("cartTotal").innerText = total.toFixed(2);
    document.querySelector(".cart-btn .badge").innerText = cartItems.length;
}

function buyNow() {
    // Store cart items and total in localStorage
    localStorage.setItem("cartItems", JSON.stringify(cartItems));
    localStorage.setItem("cartTotal", total.toFixed(2));
    // Redirect to the shipping page
    window.location.href = "shipping.php";
}
