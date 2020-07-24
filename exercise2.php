<?php 
    echo '<p>EXERCISE 2</p>';

    $countries = [
        'Venezuela' => [
            'Caracas',
            'Carabobo',
            'Zulia',
        ],
        'Colombia' => [
            'Bogota',
            'Medellin',
            'Cartagena'
        ],
        'Chile' => [
            'Santiago',
            'Valparaiso',
            'Catia'
        ],
        'Argentina' => [
            'Bueno Aires',
            'Cordoba',
            'Rosario'
        ],
        'Italia' => [
            'Milan',
            'Roma',
            'Florencia'
        ]
        ];

    //Recorremos el arreglo y mostramos su indice
    foreach($countries as $indexName => $value){
        echo $indexName.':';
        //Recorremos el valor del indice mostrado
        foreach($countries[$indexName] as $cityName){
            echo $cityName.' ';
        }
        echo '<br>';
    }
?>