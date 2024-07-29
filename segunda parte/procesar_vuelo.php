<?php
$servername = "localhost";
$username = "root";
$password = "kittie2800."; // Asegúrate de cambiarlo a tu contraseña de MySQL
$dbname = "AGENCIA";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Validar y limpiar datos
function limpiarDato($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origen = isset($_POST['origen']) ? limpiarDato($_POST['origen']) : '';
    $destino = isset($_POST['destino']) ? limpiarDato($_POST['destino']) : '';
    $fecha = isset($_POST['fecha']) ? limpiarDato($_POST['fecha']) : '';
    $plazas_disponibles = isset($_POST['plazas_disponibles']) ? limpiarDato($_POST['plazas_disponibles']) : '';
    $precio = isset($_POST['precio']) ? limpiarDato($_POST['precio']) : '';

    if (empty($origen) || empty($destino) || empty($fecha) || empty($plazas_disponibles) || empty($precio)) {
        die("Todos los campos son obligatorios.");
    }

    // Insertar datos en la tabla VUELO
    $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio)
    VALUES ('$origen', '$destino', '$fecha', $plazas_disponibles, $precio)";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo vuelo agregado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
