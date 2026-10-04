
<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$shape = $_POST['shape'];
$clarity = $_POST['clarity'];
$color = $_POST['color'];
$carat = $_POST['carat'];
$message = $_POST['message'];

$data =
    "----------------------------------------\n" .
    "DIAMOND REQUEST\n" .
    "----------------------------------------\n" .
    "Name: " . $name . "\n" .
    "Email: " . $email . "\n" .
    "Phone: " . $phone . "\n" .
    "Shape: " . $shape . "\n" .
    "Clarity: " . $clarity . "\n" .
    "Color: " . $color . "\n" .
    "Carat: " . $carat . "\n" .
    "Additional Requirement: " . $message . "\n" .
    "Date: " . date("Y-m-d H:i:s") . "\n\n";

file_put_contents("request.txt", $data, FILE_APPEND);

?>

<!DOCTYPE html>
<html>

<head>

    <title>Request Submitted</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="request-page">

        <h1>Request Submitted Successfully!</h1>

        <p>
            Thank you for your diamond request.
        </p>

        <p>
            Our team will contact you soon.
        </p>

        <a href="diamond.html">
            Back to Diamonds
        </a>

    </div>

</body>

</html>
