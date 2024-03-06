<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>faMia: Postres</title>
</head>
<body>
    <h1>FaMia</h1>
    <p><a href="http://famia.com/pizzas">Pizzas</a> | <a href="http://famia.com/bebidas">Bebidas</a> | Postres :: <a href="http://famia.com/carrito">Carrito</a></p>
    <h3>Productos a escoger</h3>
    <?php
        // foreach ($data as $key => $value) {
        //     echo $value['html'];
        // }
        foreach (PRODUCTOS["postres"] as $key => $postre) { ?>
            <div>
                <form action="" method="post">
                    <?php
                        echo "<input type=\"hidden\" name=\"key\" value=\"" . $key . "\">";
                        echo "<img src=\"".$postre["imagen"]."\" alt=\"".$postre["nombre"]."\">";
                        echo "<br/>";
                        echo "<p>".$postre["nombre"]."</p>";
                        echo "Cantidad: <select name=\"cantidad\">";
                        foreach (CANTIDAD as $value) {
                            echo "<option value=\"" . $value . "\">" . $value . "</option>";
                        }
                        echo "</select><br/><br/>";
                    ?>
                    <input type="submit" name="envio" value="Añadir al carrito">
                </form>
            </div>
            <?php
        }
    ?>
    <footer>
        <hr>
        <?php
            echo "Recomendaciones:<br/>";
            if (isset($_COOKIE["ultimoPedido"])) {
                $ultimoPedido = json_decode($_COOKIE["ultimoPedido"], true);        
                if ($ultimoPedido != null) {
                    foreach ($ultimoPedido as $producto) {
                        $tipo = ($producto["tipo"] == "pizza") ? 
                        "pizzas" : (($producto["tipo"] == "bebida") ? 
                        "bebidas" : "postres"); 
                        $nombre = PRODUCTOS[$tipo][$producto["id"]]["nombre"];               
                        $imagen = PRODUCTOS[$tipo][$producto["id"]]["imagen"];               
                    ?>
                        <div>
                            <?php
                                echo "<img src=\"".$imagen."\" alt=\"".$nombre."\">";
                                echo "<br/>";
                                echo "<p>".$nombre."</p>";
                            ?>
                        </div>
                    <?php }
                }        
            }
        ?>
    </footer>
</body>
</html>