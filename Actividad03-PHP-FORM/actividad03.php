<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hola <?= empty($_POST['nombre']) ? 'Hola' : $_POST['nombre'] ?></title>
</head>
<body>

<?php
$nombre = empty($_POST['nombre']) ? false : $_POST['nombre'];
$textoLargo = empty($_POST['textoLargo']) ? false : $_POST['textoLargo'];
$destacar = empty($_POST['destacar']) ? false : $_POST['destacar'];
?>

<?php if ($nombre && $textoLargo && $destacar): ?>
<h3>Hola <?=$_POST['nombre']?></h3>
    <p>
        <?php
        $textoLargo = explode(' ', $textoLargo);
        $destacar = explode(' ', $destacar);

        foreach ($textoLargo as $element){
            $resaltar = false;
            foreach ($destacar as $destac) {
                if ($element === $destac) {
                    $resaltar = true;
                }
            }

            if ($resaltar) {
                echo '<b>'. $element .'</b> ';
            } else {
                echo $element.' ';
            }
        }
        ?>
    </p>
<?php else: ?>
    <p>Introduce los datos correctamente</p>
<?php endif ?>

<button onclick="window.location.href='index.php'">Volver</button>

</body>
</html>