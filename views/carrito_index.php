<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>faMia: Carrito</title>
</head>
<body>
    <h1>FaMia</h1>
    <p><a href="http://famia.com/pizzas">Pizzas</a> | <a href="http://famia.com/bebidas">Bebidas</a> | <a href="http://famia.com/postres">Postres</a> :: Carrito</p>
    <h3>Su carrito</h3>
    <table border="1">
        <tbody>
            <tr><th>Descripción</th><th>Unidades</th><th>Precio</th><th>Total</th></tr>
            <?php
                if ($data['pedido'] != null) {
                    foreach ($data['pedido'] as $producto) {
                        // $tipo = ($producto["tipo"] == "pizza") ? 
                        // "pizzas" : (($producto["tipo"] == "bebida") ? 
                        // "bebidas" : "postres");
                        $nombre = $producto->getNombre();
                        $precio = $producto->getPrecio();
                        $cantidad = $producto->getCantidad();
                        $data['total'] += $precio*$cantidad;
                        echo "<tr><td>".$nombre."</td><td>".$cantidad."</td><td>".$precio." €</td><td>".$precio*$cantidad." €</td></tr>";
                    }
                }
                echo "<tr><td></td><td></td><td></td><td>".$data['total']." €</td></tr>";
            ?>
        </tbody>
    </table>
    <h3>EL TOTAL A PAGAR DEL PEDIDO ES DE <?php echo $data['total'] ?>€.</h3>
    <form action="" method="post">
        <input type="submit" name="tramite" value="Tramitar pedido">
        <input type="submit" name="cierre" value="Cierre de sesión">
    </form>
</body>
</html>