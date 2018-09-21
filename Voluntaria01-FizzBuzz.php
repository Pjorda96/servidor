<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 21/09/2018
 * Time: 6:29
 */

for ($i = 1; $i <= 100; $i++){

    if ($i % 3 === 0){
        echo 'Fizz';
    }

    if ($i % 5 === 0){
        echo 'Buzz';
    }

    if ($i % 3 !== 0 && $i % 5 !== 0){
        echo $i;
    }

    echo '<br>';
}
