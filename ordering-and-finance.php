<?php
// Connect to MySQL
// (same as above)

// Place Order
$customer_id = $_POST['customer_id'];
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$total = $quantity * $product_price;

$sql = "INSERT INTO orders (customer_id, product_id, quantity, total) VALUES ('$customer_id', '$product_id', '$quantity', '$total')";

if ($conn->query($sql) === TRUE) {
    echo "Order placed successfully";

    // Update finance table
    $order_id = $conn->insert_id;
    $amount = $total;

    $sql = "INSERT INTO finance (order_id, amount) VALUES ('$order_id', '$amount')";

    if ($conn->query($sql) === TRUE) {
        echo "Finance record updated successfully";
    } else {
        echo "Error updating finance: " . $sql . "<br>" . $conn->error;
    }

} else {
    echo "Error placing order: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

