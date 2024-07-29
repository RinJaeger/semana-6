<?php
$servername = "localhost";
$username = "root";
$password = "kittie2800.";
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

// Verificar que la solicitud sea POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Comprobar que las claves existan en el arreglo $_POST
    if (isset($_POST['nombre']) && isset($_POST['ubicación']) && isset($_POST['habitaciones_disponibles']) && isset($_POST['tarifa_noche'])) {
        $nombre = limpiarDato($_POST['nombre']);
        $ubicación = limpiarDato($_POST['ubicación']);
        $habitaciones_disponibles = limpiarDato($_POST['habitaciones_disponibles']);
        $tarifa_noche = limpiarDato($_POST['tarifa_noche']);

        if (empty($nombre) || empty($ubicación) || empty($habitaciones_disponibles) || empty($tarifa_noche)) {
            die("Todos los campos son obligatorios.");
        }

        // Insertar datos en la tabla HOTEL
        $sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche)
                VALUES ('$nombre', '$ubicación', $habitaciones_disponibles, $tarifa_noche)";

        if ($conn->query($sql) === TRUE) {
            echo "Nuevo hotel agregado exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        die("No se recibieron todos los datos necesarios.");
    }
}

$conn->close();
?>
