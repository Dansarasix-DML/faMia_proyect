<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Daniel Marín López">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>faMia: Inicio</title>
</head>
<body>
    <h1>FaMia</h1>
    <div id="sesion">
        <?php
            echo "Por favor, identifiquese:<br/><br/>";
            include("../include/login_form.php");
        ?>
    </div>
</body>
</html>