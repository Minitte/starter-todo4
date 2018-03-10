<?php

use PHPUnit\Framework\TestCase;

/**
 * Unit test cases for Zoo collection class.
 */
class ZooTest extends TestCase {

    /**
     * Setup models.
     */
    function setUp() 
    {
        $this->CI = &get_instance();
        $this->CI->load->model('zoo');
        $this->CI->load->model('baboon');
        $this->zoo = new Zoo();
    }

    /**
     * Test adding baboons to the zoo.
     */
    function testAddBaboon()
    {
        // add 6 baboons
        for ($i = 1; $i < 7; $i++ )
        {
            $baboon = new Baboon();
            $baboon->id = $i;
            $this->zoo->add($baboon);
        }
        
        // make sure we're  there
        $this->assertEquals(6,$this->zoo->size());
    }
    
    /**
     * Test the size limit.
     */
    function testAddOverLimit() {
        // add 6 baboons
        for ($i = 1; $i < 7; $i++ )
        {
            $baboon = new Baboon();
            $baboon->id = $i;
            $this->zoo->add($baboon);
        }

        // make sure we can't add a 7th
        $baboon = new Baboon();
        $baboon->id = 7;
        $this->expectException(Exception::class);
        $this->zoo->add($baboon);
    }
}