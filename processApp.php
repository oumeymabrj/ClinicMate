<?php
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "clinicmate";

// Création de la connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed:" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient = $_POST["patient"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $doctor = $_POST["doctor"];

  // Requête SQL pour insérer les données dans la table des rendez-vous
  $sql = "INSERT INTO appointments (patient,date,time,doctor) VALUES ($patient , '$date', '$time', '$doctor')";

  if ($conn->query($sql) === TRUE) {
    echo "The appointment was successfully recorded.";
  } else {
    echo "Error : " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>
