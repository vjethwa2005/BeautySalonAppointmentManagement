<?php
session_start();

// Assuming you have a database connection already set up

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve login credentials from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the credentials are correct (this is an example, you should use prepared statements to avoid SQL injection)
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'"; // Avoid plain text passwords
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // User exists, start a session
        $_SESSION['user_logged_in'] = true; // You can also store user details like user ID here
        header('Location: restricted_page.php'); // Redirect to the restricted page
    } else {
        echo "Invalid login credentials.";
    }
}
?>

