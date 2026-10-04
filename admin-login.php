<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: admin-login.html");
    exit();
}

require_once "connection.php";

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    echo "<h2>Please enter username and password.</h2>";
    echo "<a href='admin-login.html'>Go Back</a>";
    exit();
}

$sql = "SELECT * FROM admins WHERE username = ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("<h2>Database Error</h2><p>" . $conn->error . "</p>");
}

$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $admin = $result->fetch_assoc();

    if ($password === $admin["password"]) {

        echo "<h2>Admin Login Successful!</h2>";
        echo "<p>Welcome, " . htmlspecialchars($admin["username"]) . ".</p>";
        echo "<a href='index.html'>Go to Home</a>";

    } else {

        echo "<h2>Invalid Password</h2>";
        echo "<a href='admin-login.html'>Try Again</a>";
    }

} else {

    echo "<h2>Invalid Username</h2>";
    echo "<a href='admin-login.html'>Try Again</a>";
}

$stmt->close();
$conn->close();

?>