<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
    <link href="./css/tailwind.css" rel="stylesheet">
    <style>
        .error {
            color: red;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="bg-gray-800 text-white py-4 text-center">
        <h1 class="text-2xl">Gestión de Inventario</h1>
    </header>

    <!-- Formulario -->
    <div class="container mx-auto mt-8">
        <form id="inventoryForm" class="w-full max-w-sm mx-auto" method="post" action="">
            <div class="mb-4">
                <label for="productName" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Producto:</label>
                <input type="text" id="productName" name="productName" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <div id="productNameError" class="error"></div>
            </div>
            <div class="mb-4">
                <label for="unitPrice" class="block text-gray-700 text-sm font-bold mb-2">Precio por Unidad:</label>
                <input type="number" id="unitPrice" name="unitPrice" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <div id="unitPriceError" class="error"></div>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Cantidad en Inventario:</label>
                <input type="number" id="quantity" name="quantity" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                <div id="quantityError" class="error"></div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 text-center mt-8">
        <p>&copy; 2024 Mi Empresa</p>
    </footer>

    <script src="./js/main.js"></script>
</body>
</html>
<?php
function guardarProducto($nombre, $precio, $cantidad, &$productos) {
    $productos[] = array(
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad
    );
    return $productos;
}

$productos = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST['productName'];
    $unitPrice = $_POST['unitPrice'];
    $quantity = $_POST['quantity'];

    $errors = [];

    if (empty($productName)) {
        $errors['productName'] = 'Por favor, ingrese el nombre del producto';
    }

    if (!is_numeric($unitPrice)) {
        $errors['unitPrice'] = 'Por favor, ingrese un precio válido';
    }

    if (!is_numeric($quantity)) {
        $errors['quantity'] = 'Por favor, ingrese una cantidad válida';
    }

    if (empty($errors)) {
        $productos = guardarProducto($productName, $unitPrice, $quantity, $productos);
        echo 'Datos válidos, producto guardado.';
    } else {
        var_dump($errors);
    }
}
?>

