<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actividad01</title>
</head>
<body>

<h2>Actividad 01</h2>

<p>Lo siento, me aburría</p>
<p>Puke rainbows</p>

<div style="background-color: rgb(0,0,0)">rgb(0,0,0)</div>

<?php
$i = 0;

do{
    echo "<div style='background-color: rgb(0,$i,0)'>0,$i,0</div>";
    ++$i;
} while ($i <= 255);

$i = 0;

do{
    echo "<div style='background-color: rgb($i,0,0)'>$i,0,0</div>";
    ++$i;
} while ($i <= 255);

$i = 0;

do{
    echo "<div style='background-color: rgb(0,0,$i)'>0,0,$i</div>";
    ++$i;
} while ($i <= 255);

$i = 0;
$j = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb(0,$i,$j)'>0,$i,$j</div>";
    ++$i;
    ++$j;
}

$i = 0;
$j = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb($j,$i,0)'>$j,$i,0</div>";
    ++$i;
    ++$j;
}

$i = 0;
$j = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb($j,0,$i)'>$j,0,$i</div>";
    ++$i;
    ++$j;
}

$i = 0;
$j = 0;
$k = 0;

while ($i <= 255 && $i <= 255){
    echo "<div style='background-color: rgb($j,$k,$i)'>$j,$k,$i</div>";
    ++$i;
    ++$j;
    ++$k;
}
?>
</body>
</html>