<?php

$rawData = file_get_contents('php://input');
$jsonData = json_encode($rawData);

//przeprowadzam walidację danych wejściowych
//sprawdzam jaka akcja ma zostać wykonana
//przeprowadzam walidację danych dla konkretnej akcji
//ładuję klasę odpowiedzialną za daną akcję
//wykonuje akcje
//zwracam informację zwrotną wraz ze statusem

//co trzeba ogarnąć
/*
- jak będzie wyglądać standard danych, wygląd zwrotki itp
*/