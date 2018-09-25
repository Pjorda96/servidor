<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actividad01</title>
</head>
<body>

<h2>Actividad 01</h2>

<p>Puke rainbows</p>

<?php
$i = 0;

do{
    echo "<div style='background-color: rgb(0,$i,0)'>".sprintf('#%02x%02x%02x', 0, $i, 0).'</div>';
    ++$i;
} while ($i <= 255);

$i = 0;

do{
    echo "<div style='background-color: rgb($i,0,0)'>".sprintf('#%02x%02x%02x', $i, 0, 0).'</div>';
    ++$i;
} while ($i <= 255);

$i = 0;

do{
    echo "<div style='background-color: rgb(0,0,$i)'>".sprintf('#%02x%02x%02x', 0, 0, $i).'</div>';
    ++$i;
} while ($i <= 255);

$i = 0;
$j = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb(0,$i,$j)'>".sprintf('#%02x%02x%02x', 0, $i, $j).'</div>';
    ++$i;
    ++$j;
}

$i = 0;
$j = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb($j,$i,0)'>".sprintf('#%02x%02x%02x', $j, $i, 0).'</div>';
    ++$i;
    ++$j;
}

$i = 0;
$j = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb($j,0,$i)'>".sprintf('#%02x%02x%02x', $j, 0, $i).'</div>';
    ++$i;
    ++$j;
}

$i = 0;
$j = 0;
$k = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb($j,$k,$i)'>".sprintf('#%02x%02x%02x', $j, $k, $i).'</div>';
    ++$i;
    ++$j;
    ++$k;
}
?>
</body>
</html>