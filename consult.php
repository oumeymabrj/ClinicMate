<?php
session_start(); // Démarrez la session

if (!isset($_SESSION['ID'])) {
    // Redirigez vers la page de login si l'identifiant du patient n'est pas défini dans la session
    header("Location: processlogin.php"); // Redirection vers la page de login
    exit(); // Arrêtez le script
}

$patient_id = $_SESSION['patient_id'];

$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "clinicmate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour récupérer les détails du dossier médical du patient
$sql = "SELECT * FROM emr WHERE id = '$patient_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th></tr>*
    <tr><th>Doctor Name</th></tr>
    <tr><th>Patient Name</th></tr>
    <tr>th>Diagnostics</th></tr>
    <tr><th>Medicaments</th></tr>
    tr><th>Analyses</th></tr>
    tr><th>Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>" . $row["ID"] . "</tr>";
        echo "<tr>" . $row["doctor"] . "</tr>";
        echo "<tr>" . $row["patient"] . "</tr>";
        echo "<tr>" . $row["diagnostics"] . "</tr>";
        echo "<tr>" . $row["medicaments"] . "</tr>";
        echo "<tr>" . $row["analyses"] . "</tr>";
        echo "<tr>" . $row["date"] . "</tr>";
    }
    echo "</table>";
} else {
    echo "No records found for this patient ID.";
}

$conn->close();
?>
