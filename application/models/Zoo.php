<?php

class Zoo extends Memory_Model {
    
    // over-ride base collection adding, with a limit
    function add($record) {
        if ($this->size() >= 6) {
            throw new Exception('The zoo is full');
        }
    }
}