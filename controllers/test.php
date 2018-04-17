<?php

class Person{
    private $properties;

    public function __get($propertyName){
        if(array_key_exists($propertyName, $properties)){
            return $this->properties[$propertyName];
        }

    }
    public function __set($propertyNane, $propertyValue){
        $this->properties[$propertyNane] = $propertyValue;
    }

}

$p = new Person();
$p->lastName = 'John';
$p->firstName = 'Doe';

var_dump($p);