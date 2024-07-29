<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "kittie2800.";
$dbname = "agencia_hotelera";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir y validar los datos del formulario
$nombre = $_POST['nombre'];
$ubicación = $_POST['ubicación'];
$habitaciones_disponibles = $_POST['habitaciones_disponibles'];
$tarifa_noche = $_POST['tarifa_noche'];

if (empty($nombre) || empty($ubicación) || empty($habitaciones_disponibles) || empty($tarifa_noche)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Insertar los datos en la tabla HOTEL
$sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES ('$nombre', '$ubicación', $habitaciones_disponibles, $tarifa_noche)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo hotel agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
