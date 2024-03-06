<?php
    


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/comandStyle.css">
    <title>faMia: Inicio</title>
</head>
<body>
    <h1>FaMia</h1>
    <div id="sesion">
        <?php
            // include "../lib/funciones.php";
            $comandas_pendientes = [];
            echo "Bienvenido ".$data["user"];
            echo "<br/><a href=\"http://famia.com/cierre/\">Cerrar sesión</a>";
            echo "<hr/>";
            echo "<h3>Comandas</h3>";
            $directorio = "../files/";
            $archivos = scandir($directorio);

            echo "<ul>";
            foreach ($archivos as $archivo) {
                if ($archivo != "." && $archivo != "..") {
                    $rutaArchivo = $directorio . "/" . $archivo;

                    $handle = fopen($rutaArchivo, "r");

                    $primeraLinea = fgets($handle);

                    fclose($handle);

                    $nopendiente = (contienePalabra($archivo, "elaborada") ? true : false);
                    $style = $nopendiente ? "elaborada" : "pendiente";
                    echo "<li class=\"{$style}\"><form method=\"post\" action=\"\">";
                    echo str_replace('-', '', $primeraLinea);;
                    if (!$nopendiente) {
                        echo "<input type=\"hidden\" name=\"archivo\" value=\"$archivo\">";
                        echo "<input class=\"boton\" type=\"submit\" name=\"elaborar\" value=\"Realizar comanda\">";
                    } else {
                        echo "<input type=\"hidden\" name=\"archivo\" value=\"$archivo\">";
                        echo "<input class=\"boton\" type=\"submit\" name=\"borrar\" value=\"Borrar comanda\">";
                    }
                    echo "</form></li>";
                }
            }
            echo "</ul>" 
        ?>
    </div>
</body>
</html>