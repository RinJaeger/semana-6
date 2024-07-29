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

// Insertar datos en la tabla VUELO
for ($i = 1; $i <= 5; $i++) {
    $origen = "Origen $i";
    $destino = "Destino $i";
    $fecha = date('Y-m-d', strtotime("+" . rand(0, 30) . " days"));
    $plazas_disponibles = rand(50, 200);
    $precio = rand(100, 500);

    $sql = "INSERT INTO VUELO (origen, destino, fecha, plazas_disponibles, precio)
            VALUES ('$origen', '$destino', '$fecha', $plazas_disponibles, $precio)";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Insertar datos en la tabla HOTEL
for ($i = 1; $i <= 5; $i++) {
    $nombre = "Hotel $i";
    $ubicacion = "Ubicación $i";
    $habitaciones_disponibles = rand(10, 50);
    $tarifa_noche = rand(50, 300);

    $sql = "INSERT INTO HOTEL (nombre, ubicación, habitaciones_disponibles, tarifa_noche)
            VALUES ('$nombre', '$ubicacion', $habitaciones_disponibles, $tarifa_noche)";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "Datos iniciales en las tablas VUELO y HOTEL han sido registrados exitosamente";

$conn->close();
?>
