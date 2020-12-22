<?php 
namespace App\Brouillon;

class Calculateur {
    public function testAddition(Int $nb1, Int $nb2) {
        return $nb1 + $nb2;
    }

    public function testDivision(Int $nb1,Int $nb2){
        return $nb1 / $nb2;
    }
}