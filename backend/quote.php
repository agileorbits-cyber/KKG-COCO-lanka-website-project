<?php

include "config.php";

$name = $_POST['name'];
$email = $_POST['email'];
$company = $_POST['company'];
$product = $_POST['product'];
$quantity = $_POST['quantity'];
$message = $_POST['message'];

$sample_request = isset($_POST['sample_request'])
    ? $_POST['sample_request']
    : "No";

$sql = "INSERT INTO quote_requests
(
name,
email,
company,
product,
quantity,
message,
sample_request
)
VALUES
(
'$name',
'$email',
'$company',
'$product',
'$quantity',
'$message',
'$sample_request'
)";

if(mysqli_query($conn,$sql))
{
    $to = "sampath@kkgcocolanka.com,kkgcocolanka@gmail.com";

    $subject = "New Quote Request";

    $body = "
    New Quote Request Details

    Name: $name
    Email: $email
    Company: $company
    Product: $product
    Quantity: $quantity
    Sample Request: $sample_request

    Message:
    $message
    ";

    $headers = "From: $email";

    if(mail($to, $subject, $body, $headers))
    {
        echo "
        <script>
        alert('Quote Request Submitted and Email Sent!');
        window.location='../get.html';
        </script>
        ";
    }
    else
    {
        echo "
        <script>
        alert('Quote Request Saved, But Email Not Sent!');
        window.location='../get.html';
        </script>
        ";
    }
}
else
{
    echo "Error : " . mysqli_error($conn);
}

mysqli_close($conn);

?>