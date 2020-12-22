<?php 

namespace App\tests\BrouillonTest;

use App\Brouillon\Calculateur;
use PHPUnit\Framework\TestCase;;

class CalculateurTest extends TestCase {
    public function testAddition() {
        $calculateur = new Calculateur();
        $rs = $calculateur->testAddition(5, 10);
        $this->assertEquals(15, $rs);
    }

    public function testDivision() {
        $calculateur = new Calculateur();
        $rs = $calculateur->testDivision(20, 4);
        $this->assertEquals(5, $rs);
    }
}