<?php
require('stripe-php-master/init.php');

$secretKey = "sk_test_51QKzHjRuE3GrEaQRCLVemTvvrATj6JFrx6CDKiVhTrFAvpEVfYnQNR0d04ScMkf2RH4m7bjMHC1uM17TWXb2ucm1000uHon7jg";
\Stripe\Stripe::setApiKey($secretKey);

header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
$cartTotal = $data['cartTotal'];

try {
    $session = \Stripe\Checkout\Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'pkr',
                'product_data' => [
                    'name' => 'Order Total',
                ],
                'unit_amount' => $cartTotal * 100,  // Convert to cents for Stripe
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
        'success_url' => 'http://localhost/Faizan/blog/success.php',
        'cancel_url' => 'http://localhost/cancel.php',
    ]);

    echo json_encode(['session_id' => $session->id]);

} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
