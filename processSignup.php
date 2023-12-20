<?php
$servername = "localhost"; 
$username_db = "admin"; 
$password_db = "";
$dbname = "clinicmate";



$conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed:" . $conn->connect_error);
    }
  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $id = $_POST['id'];
        $email = $_POST['mail'];
        $roles = $_POST['roles'];
        $genre = $_POST['gender'];
        $date_de_naissance = $_POST['date_de_naissance'];
        $password = $_POST['mot_de_passe'];

        $sql = "INSERT INTO coordonnées (Username, ID, Email, Role, Gender, date_birth, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

    // Bind parameters
        $stmt->bind_param("sssssss", $username, $id, $email, $roles, $genre, $date_de_naissance, $password);

    // Execute query
        $stmt->execute();

    // Check query result
        if ($stmt->affected_rows === 1) {
        echo "The registration was successfully recorded.";
        } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
        }

        // Close statement
        $stmt->close();

        // Redirect to login page
        header('Location: login.html');
}
$conn->close();

?>
