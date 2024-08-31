function showPaymentFields() {
    const paymentMethod = document.getElementById("payment").value;
    const creditCardFields = document.getElementById("creditCardFields");
    const paypalFields = document.getElementById("paypalFields");

    creditCardFields.style.display = "none";
    paypalFields.style.display = "none";

    if (paymentMethod === "credit_card") {
        creditCardFields.style.display = "block";
    } else if (paymentMethod === "paypal") {
        paypalFields.style.display = "block";
    }
}
