<?php
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "clinicmate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$patient_name = $_POST['patient_name'];
$date = $_POST['date'];
$time = $_POST['time'];
$doctor_name = $_POST['doctor_name'];
$status = $_POST['status'];

// Insérer les données dans la base de données
$sql = "INSERT INTO appointments (patient, date, time, doctor, status)
VALUES ('$patient_name', '$date', '$time', '$doctor_name', '$status')";

if ($conn->query($sql) === TRUE) {
  echo "Appointment added successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
