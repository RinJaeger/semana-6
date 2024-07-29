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

$sql = "SELECT h.nombre, COUNT(r.id_reserva) as num_reservas
        FROM HOTEL h
        JOIN RESERVA r ON h.id_hotel = r.id_hotel
        GROUP BY h.id_hotel
        HAVING COUNT(r.id_reserva) > 2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nombre del Hotel</th>
                <th>Número de Reservas</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['nombre']}</td>
                <td>{$row['num_reservas']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay hoteles con más de dos reservas";
}

$conn->close();
?>
