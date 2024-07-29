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
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$plazas_disponibles = $_POST['plazas_disponibles'];
$precio = $_POST['precio'];

if (empty($origen) || empty($destino) || empty($fecha) || empty($plazas_disponibles) || empty($precio)) {
    echo "Todos los campos son obligatorios.";
    exit;
}

// Insertar los datos en la tabla VUELO
$sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio) VALUES ('$origen', '$destino', '$fecha', $plazas_disponibles, $precio)";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo vuelo agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
