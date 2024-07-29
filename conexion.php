<?php
$servername = "localhost";
$username = "root";
$password = "kittie2800.";
$dbname = "agencia_hotelera";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa";

// Cerrar conexión
$conn->close();
?>
