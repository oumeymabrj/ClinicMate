<?php
$servername = "localhost";
$username = "admin";
$password = "";
$dbname = "clinicmate";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des valeurs postées
    $ID = $_POST['ID'];
    $password = $_POST['password'];

    // Échappement des variables pour éviter les injections SQL (utilisation des requêtes préparées serait encore mieux)
    $ID = mysqli_real_escape_string($conn, $ID);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM coordonées WHERE ID='$ID' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $role = $user['Role']; 
        $welcomeMessage = "";

        if ($role === "Doctor") {
            $welcomeMessage = "Welcome Doctor " . $user['username'];
            // Redirection vers l'interface du docteur
            header('Location: doctor.html');
            exit();
        } elseif ($role === "Patient") {
            $welcomeMessage = "Welcome Patient " . $user['username'];
            // Redirection vers l'interface du patient
            header('Location: patient.html');
            exit();
        } elseif ($role === "Administrative staff") {
            $welcomeMessage = "Welcome Administrative Staff " . $user['username'];
            // Redirection vers l'interface du personnel administratif
            header('Location: staff.html');
            exit();
        } elseif ($role === "Laboratory") {
            $welcomeMessage = "Welcome Laboratory " . $user['username'];
            // Redirection vers l'interface du laboratoire
            header('Location: technician.html');
            exit();
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();

?>