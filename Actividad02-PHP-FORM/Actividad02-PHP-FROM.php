<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actividad02</title>
</head>
<body>

<h2>Actividad 02</h2>

<?php
$rgb = [
    'red' => 0,
    'green' => 0,
    'blue' => 0,
    'state' => true
];

$newRgb = validate($rgb);

if ($newRgb['state']): ?>
    <p>Tu color es:</p>
    <div style="background-color: rgb(<?=$newRgb['red']?>,<?=$newRgb['green']?>,<?=$newRgb['blue']?>)">
        <?=sprintf('#%02x%02x%02x', $newRgb['red'], $newRgb['green'], $newRgb['blue'])?>
    </div>
<?php else: ?>
    <p>Los datos introducidos no son correctos.</p>
<?php endif ?>

<button onclick="location='Actividad02-PHP-FROM.php'">Volver</button>

<?php
function validate($rgb){

    isset($_POST['red']) && $_POST['red'] <=255 && $_POST['red'] >=0
        ? $rgb['red'] = $_POST['red']
        : $rgb['state'] = false;

    isset($_POST['green']) && $_POST['green'] <=255 && $_POST['green'] >=0
        ? $rgb['green'] = $_POST['green']
        : $rgb['state'] = false;

    isset($_POST['blue']) && $_POST['blue'] <=255 && $_POST['blue'] >=0
        ? $rgb['blue'] = $_POST['blue']
        : $rgb['state'] = false;

    return $rgb;
}
?>
</body>
</html>