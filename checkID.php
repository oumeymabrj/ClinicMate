<?php
$username = $_POST['username'];
$id = $_POST['id'];
$email = $_POST['mail'];
$roles = $_POST['roles'];
$genre = $_POST['gender'];
$date_de_naissance = $_POST['date_de_naissance'];
$password = $_POST['mot_de_passe'];

$servername = "localhost"; 
$username_db = "admin"; 
$password_db = "";
$dbname = "clinicmate";

// Création de la connexion
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Préparation et exécution de la requête SQL
$stmt = $conn->prepare("INSERT INTO coordonées (Username, ID, Email, Role, Gender, date_birth, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $username, $id, $email, $roles, $genre, $date_de_naissance, $password);

if ($stmt->execute()) {
    header('Location: login.html');
    echo "Successful registration!";
    exit();
} else {
    echo "Error : " . $conn->error;
}

// Fermeture de la connexion
$conn->close();
?>
