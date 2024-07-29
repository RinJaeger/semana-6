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

// Insertar diez reservas
for ($i = 1; $i <= 10; $i++) {
    $id_cliente = rand(1, 100); // Suponiendo que hay clientes con id entre 1 y 100
    $fecha_reserva = date('Y-m-d', strtotime("+" . rand(0, 30) . " days"));
    $id_vuelo = rand(1, 5); // Asegúrate de que los id de vuelo existen en la tabla VUELO
    $id_hotel = rand(1, 5); // Asegúrate de que los id de hotel existen en la tabla HOTEL

    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel)
            VALUES ($id_cliente, '$fecha_reserva', $id_vuelo, $id_hotel)";

    if ($conn->query($sql) !== TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

echo "Diez reservas han sido registradas exitosamente";

$conn->close();
?>
