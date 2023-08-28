<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cartcompras";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error); 
}
    
// Ejemplo de inserción de datos en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    
    // Consulta SQL para insertar datos en la tabla 'productos'
    $sql = "INSERT INTO productos (nombre, precio) VALUES ('$productName', $price)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Producto agregado correctamente";
    } else {
        echo "Error al agregar el producto: " . $conn->error;
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
