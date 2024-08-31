document.addEventListener("DOMContentLoaded", function() {
    const cartItems = JSON.parse(localStorage.getItem("cartItems"));
    const cartTotal = localStorage.getItem("cartTotal");

    const cartItemsContainer = document.getElementById("cartItems");
    cartItems.forEach(item => {
        const itemElement = document.createElement("div");
        itemElement.className = "product-item";
        itemElement.innerHTML = `${item.name} - $${item.price.toFixed(2)}`;
        cartItemsContainer.appendChild(itemElement);
    });

    document.getElementById("cartTotal").innerText = cartTotal;
});

function placeOrder() {
    const name = document.getElementById("name").value;
    const address = document.getElementById("address").value;
    const payment = document.getElementById("payment").value;

    if (name && address && payment) {
        alert("Order has been placed!");
        // Clear the cart and redirect to homepage
        localStorage.clear();
        window.location.href = "index.html";
    } else {
        alert("Please fill in all the required details.");
    }
}
