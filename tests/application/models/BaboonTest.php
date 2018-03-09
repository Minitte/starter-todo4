<?php

use PHPUnit\Framework\TestCase;

/**
 * Unit test cases for Task model class
 */
class BaboonTest extends TestCase {

    /**
     * Sets up sample values for testing
     */
    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('baboon');
        $this->monkeyS = new Baboon();
        $this->monkeyS->id = 1;
        $this->monkeyS->name = "Mike Jam";
        $this->monkeyS->species = 'Yellow';
        $this->monkeyS->weight = 22;
    }

    /**
     * Test the id validation 
     */
    function testIDEmpty() {
        // empty test
        $this->expectException('Exception');
        $this->monkeyS->setId('');
        $this->assertEquals(1, $this->monkeyS->id);
    }

    function testIDNonNumber() {
        // non number test
        $this->expectException('Exception');
        $this->monkeyS->setId('ozma');
        $this->assertEquals(1, $this->monkeyS->id);
    }
    
    function testIDValidValue() {
        // valid number test
        $this->monkeyS->setId(19);
        $this->assertEquals(19, $this->monkeyS->id);
    }

    /**
     * Test the name validation 
     */
    function testNameEmpty() {
        // empty test
        $this->expectException('Exception');
        $this->monkeyS->setName('');
        $this->assertEquals('Mike Jam', $this->monkeyS->name);
    }

    function testNameGreaterThan30Length() {
        // 30+ chars test
        $this->expectException('Exception');
        $this->monkeyS->setName('kjlgakjlhgagfhjgfhjgahgfgfhgfhjgfhjewttjreioyhvbvnzxmn,ny;iupooiutyewytrfgc');
        $this->assertEquals('Mike Jam', $this->monkeyS->name);
    }

    function testNameValidValue() {
        // valid name  test
        $this->monkeyS->setName('Gladstone');
        $this->assertEquals('Gladstone', $this->monkeyS->name);
    }

    /**
     * Test the species validation 
     */
    function testSpeciesEmpty() {
        // empty test
        $this->expectException('Exception');
        $this->monkeyS->setSpecies('');
        $this->assertEquals('Yellow', $this->monkeyS->species);
    }

    function testSpeciesNumber() {
        // non char test
        $this->expectException('Exception');
        $this->monkeyS->setSpecies(10);
        $this->assertEquals('Yellow', $this->monkeyS->species);
    }
    
    function testSpeciesWrongSpecies() {
        // non species test
        $this->expectException('Exception');
        $this->monkeyS->setSpecies('pSurface');
        $this->assertEquals('Yellow', $this->monkeyS->species);
    }
    
    function testSpeciesValidHamadryas() {
        // valid species test
        $this->monkeyS->setSpecies('Hamadryas');
        $this->assertEquals('Hamadryas', $this->monkeyS->species);
    }
    
    function testSpeciesValidGuinea() {
        $this->monkeyS->setSpecies('Guinea');
        $this->assertEquals('Guinea', $this->monkeyS->species);
    }
    
    function testSpeciesValidOlive() {
        $this->monkeyS->setSpecies('Olive');
        $this->assertEquals('Olive', $this->monkeyS->species);
    }
    
    function testSpeciesValidChacma() {
        $this->monkeyS->setSpecies('Chacma');
        $this->assertEquals('Chacma', $this->monkeyS->species);
    }
    
    function testSpeciesValidYellow() {
        $this->monkeyS->setSpecies('Yellow');
        $this->assertEquals('Yellow', $this->monkeyS->species);
    }

    /**
     * Test the weight validation 
     */
    function testWeightEmpty() {
        // empty test
        $this->expectException('Exception');
        $this->monkeyS->setWeight('');
        $this->assertEquals(22, $this->monkeyS->weight);
    }

    function testWeightChar() {
        // char test
        $this->expectException('Exception');
        $this->monkeyS->setWeight('Red Mushroom');
        $this->assertEquals(22, $this->monkeyS->weight);
    }

    function testWeightGreaterThan60() {
        // larger than 60 test
        $this->expectException('Exception');
        $this->monkeyS->setWeight(125);
        $this->assertEquals(22, $this->monkeyS->weight);
    }

    function testWeightNegative() {
        // negative test
        $this->expectException('Exception');
        $this->monkeyS->setWeight(-34);
        $this->assertEquals(22, $this->monkeyS->weight);
    }

    function testWeightValid() {
        // negative test
        $this->monkeyS->setWeight(35);
        $this->assertEquals(35, $this->monkeyS->weight);
    }
}