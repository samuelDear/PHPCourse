<?php 

    echo '<p>EXERCISE 1</p>';
    //Declaramos el arreglo
    $arreglo = [
        'keyStr1' => 'lado',
        0 => 'ledo',
        'keyStr2' => 'lido',
        1 => 'lodo',
        2 => 'ludo'
    ];

    //Recorremos el arreglo
    foreach($arreglo as $value){
        echo $value.'<br>';
    }

    echo '<br>Decirlo al reves lo dudo. <br><br>';
    //Volteamos el arreglo
    $arreglo = array_reverse($arreglo);

    //Recorremos el arreglo
    foreach($arreglo as $value){
        echo $value.'<br>';
    }
?>