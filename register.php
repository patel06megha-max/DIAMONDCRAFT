<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: new-user.html");
    exit();
}

require_once "connection.php";

$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$password = $_POST["password"] ?? "";
$confirm_password = $_POST["confirm_password"] ?? "";
$address = trim($_POST["address"] ?? "");


if (
    $name === "" ||
    $email === "" ||
    $phone === "" ||
    $password === "" ||
    $confirm_password === "" ||
    $address === ""
) {
    echo "<h2>Please fill all fields.</h2>";
    echo "<a href='new-user.html'>Go Back</a>";
    exit();
}


if ($password !== $confirm_password) {
    echo "<h2>Passwords do not match.</h2>";
    echo "<a href='new-user.html'>Go Back</a>";
    exit();
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO users (`name`, `email`, `phone`, `password`, `address`)
        VALUES (?, ?, ?, ?, ?)";


$stmt = $conn->prepare($sql);


if ($stmt === false) {
    die("<h2>Database Error</h2><p>" . $conn->error . "</p>");
}


$stmt->bind_param(
    "sssss",
    $name,
    $email,
    $phone,
    $hashed_password,
    $address
);


if ($stmt->execute()) {

    echo "<h2>Registration Successful!</h2>";
    echo "<p>Your information has been saved successfully.</p>";
    echo "<a href='index.html'>Go to Home</a>";

} else {

    if ($stmt->errno == 1062) {
        echo "<h2>Email already registered.</h2>";
        echo "<a href='new-user.html'>Try Again</a>";
    } else {
        echo "<h2>Registration Failed</h2>";
        echo "<p>" . $stmt->error . "</p>";
        echo "<a href='new-user.html'>Go Back</a>";
    }

}


$stmt->close();
$conn->close();

?>