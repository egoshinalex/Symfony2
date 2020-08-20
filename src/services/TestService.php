<?php


namespace App\services;


use phpDocumentor\Reflection\Types\Integer;

class TestService
{
private $curs = 60;
public function convert($rub){
    return $rub/$this->curs;
}
}