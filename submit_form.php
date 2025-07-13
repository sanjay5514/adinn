<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "contact_db";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$contact_number = $conn->real_escape_string($_POST['contact_number']);
$website = $conn->real_escape_string($_POST['website']);
$message = $conn->real_escape_string($_POST['message']);

$sql = "INSERT INTO contact_form (name, email, contact_number, website, message)
        VALUES ('$name', '$email', '$contact_number', '$website', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Thanks, your message has been sent!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
