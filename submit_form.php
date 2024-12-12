<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extracting data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $appointmentDate = $_POST['appointment-date'];
    $message = $_POST['message'];
    
    
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $phone = htmlspecialchars($phone);
    $service = htmlspecialchars($service);
    $appointmentDate = htmlspecialchars($appointmentDate);
    $message = htmlspecialchars($message);
    
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "beautysalon";

   
    $conn = new mysqli($servername, $username, $password, $dbname);

   
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO appointments (name, email, phone, service, appointment_date, message)
            VALUES ('$name', '$email', '$phone', '$service', '$appointmentDate', '$message')";

   
    if ($conn->query($sql) === TRUE) {
        echo "Appointment successfully booked!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
