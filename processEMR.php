<?php
$servername = "localhost";
$username = "adminpro";
$password = "";
$dbname = "clinicmate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $id = $_POST["id"];
    $doctor_name = $_POST["doctor_name"];
    $patient_name = $_POST["patient_name"];
    $diagnostics = $_POST["diagnostics"];
    $medicaments = $_POST["medicaments"];
    $analyses = $_POST["analyses"];
    $date = $_POST["date"];
$sql = "INSERT INTO dossiers (ID, doctor, patient, diagnostics, medicaments, analyses, date)
    VALUES ('$id', '$doctor_name', '$patient_name', '$diagnostics', '$medicaments', '$analyses', '$date')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>