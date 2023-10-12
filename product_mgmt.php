<?php
// Connect to MySQL
// (same as above)

// Add Product
$name = $_POST['name'];
$price = $_POST['price'];

$sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";

if ($conn->query($sql) === TRUE) {
    echo "Product added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

