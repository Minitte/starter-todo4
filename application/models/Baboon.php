<?php

class Baboon extends Entity {
    protected $id;
    protected $name;
    protected $species;
    protected $weight;

    // insist that an ID be present
    public function setId($value) {
        if (empty($value)) {
            throw new InvalidArgumentException('An Id must have a value');
        }
        
        if (!is_numeric($value)) {
            throw new Exception('Value must be a numeric');
        }
        
        $this->id = $value;
        return $this;
    }

    // insist that a Name be present and no longer than 30 characters
    public function setName($value) {
        if (empty($value)) {
            throw new Exception('A Name cannot be empty');
        }
        if (strlen($value) > 30) {
            throw new Exception('A Name cannot be longer than 30 characters');
        }

        $this->name = $value;
        return $this;
    }

    // insist only valid baboon species
    public function setSpecies($value) {
        switch ($value) {
            case 'Hamadryas':
            case 'Guinea':
            case 'Olive':
            case 'Yellow':
            case 'Chacma':
                break;
            default:
                throw new Exception('Invalid species name');
        }

        $this->species = $value;
        return $this;
    }

    // insist that a Weight be a positive number, and less than 60 (kilograms)
    public function setWeight($value) {
        if (!is_numeric($value)) {
            throw new Exception('Weight must be numeric');
        }

        if ($value < 5) {
            throw new Exception('A baboon cannot weigh more than 60kg');
        }

        if ($value > 60) {
            throw new Exception('A baboon cannot weigh more than 60kg');
        }

        $this->weight = $value;
        return $this;
    }
}