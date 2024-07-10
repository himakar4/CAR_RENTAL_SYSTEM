<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('connection.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $experience = $_POST['experience'];
    $comments = $_POST['comments'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Database connection
    

    // Prepare SQL statement
    $sql = "INSERT INTO feedback (EMAIL, COMMENT) VALUES ('$email', '$comments')";

    // Execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Form submission failed!";
}
?>
