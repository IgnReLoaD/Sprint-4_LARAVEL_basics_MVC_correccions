<?php

namespace App\Enums;

// Team_category -> field 'name'
enum Category: int {
    case FirstTeam = 1;
    case SecondTeam= 2;
    case Juvenil   = 3;
    case Alevi     = 4;
    case Cadet     = 5;
    case Infantil  = 6;
    case Amateur   = 7;
    case Legends   = 8;
};

const CATEGORY_NAME = [
    'FirstTeam'  => '1',
    'SecondTeam' => '2',
    'Juvenil'    => '3',
    'Alevi'      => '4',
    'Cadet'      => '5',
    'Infantil'   => '6',
    'Amateur'    => '7',
    'Legends'    => '8'
];

// se hace referencia en View (blade) así:  @if($object->getCategory() == \App\Enums\Constant::NAME_CATEGORY['FirstTeam'])

?>