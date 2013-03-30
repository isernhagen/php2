<?php

class Person {

    protected $name;
    protected $age;


    public function __construct($name, $age) {
        $this->name = $name;
        $this->age  = $age;
    }
    
    public function __get($property) { // name ou age
        
        if (isset($this->$property)) {
            return $this->$property; //Person::age ou Person::name
        }
        else
        {
            die("$property nao existe");
        }
    } 
    
    public function __set($property, $value) { // ('name', 'Bob da Silva') ou ('age', 30)
        if ( isset($this->$property)) {
            $this->$property = $value;
        }
        else
        {
            die("$value nao existe");
        }
    }
    
    public function __call($name, $arguments) {
        
        echo "Metodo chamado: " . $name . "<br>";
        echo "Argumentos do metodo: <br>";
        echo "<pre>";
        print_r($arguments);
        echo "</pre>";
        
    }
}