<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actividad 03</title>
</head>
<body>
<h2>Actividad 03</h2>

<form action="actividad03.php" method="post">
    <label for="nombre">Nombre: </label><br>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre"><br>

    <label for="textoLargo" style="margin-top: 10px">Texto: </label><br>
    <!--<input type="text" id="textoLargo" cols="30" rows="10" placeholder="Introduce aquí el texto"><br>-->
    <textarea name="textoLargo" id="textoLargo" name="textoLargo" cols="30" rows="10" placeholder="Introduce aquí el texto"></textarea><br>

    <label for="destacar" style="margin-top: 10px">Carácteres a destacar: </label><br>
    <input type="text" id="destacar" name="destacar" placeholder="Carácteres a destacar"><br>

    <button type="submit" style="margin-top: 10px">Enviar</button>
</form>

</body>
</html>