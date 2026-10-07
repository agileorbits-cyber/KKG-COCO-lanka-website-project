<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $customer_name = $_POST["customer_name"];
    $email         = $_POST["email"];
    $phone         = $_POST["phone"];
    $address       = $_POST["address"];
    $city          = $_POST["city"];
    $country       = $_POST["country"];
    $order_notes   = $_POST["order_notes"];
    $products      = $_POST["products"];
    $total         = $_POST["total"];


    $sql = "INSERT INTO orders
            (customer_name, email, phone, address, city, country, order_notes, products, total)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";


    $stmt = mysqli_prepare($conn, $sql);


    mysqli_stmt_bind_param(
        $stmt,
        "ssssssssd",
        $customer_name,
        $email,
        $phone,
        $address,
        $city,
        $country,
        $order_notes,
        $products,
        $total
    );


    if (mysqli_stmt_execute($stmt)) {

        echo "success";

    } else {

        echo "error";

    }


    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}

?>