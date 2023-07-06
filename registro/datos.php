<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores enviados desde el formulario
    $rut = $_POST['inputRut'];
    // Obtener el contenido actual del archivo
    $jsonData = file_get_contents("registros.json");
    // Convertir el contenido en un arreglo asociativo
    $data = json_decode($jsonData, true);
    // Agregar los nuevos datos al arreglo
    $data[] = array('RUT' => $rut);
    // Convertir el arreglo a formato JSON
    $jsonData = json_encode($data);
    // Guardar los datos en el archivo
    if (file_put_contents("registros.json", $jsonData)) {
        $message = "Los datos se han guardado correctamente.";
    } else {
        $message = "Error al guardar los datos en el archivo.";
    }
} else {
    $message = "Acceso no válido.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resultado del registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <h5 class="card-header text-center">Resultado del registro</h5>
            <div class="card-body">
                <p><?php echo $message; ?></p>
            </div>
        </div>
    </div>
</body>
</html>
