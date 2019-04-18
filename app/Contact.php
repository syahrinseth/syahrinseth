<?php

namespace App;

class Contact
{
    public $name;
    public $email;
    public $message;

    public function __construct($name, $email, $message){
        $this->name = $name;
        $this->email = $email;
        $this->message = $message;
    }

    public function all(){
        return [
            'name' => $this->$name,
            'email' => $this->email,
            'message' => $this->message
        ];
    }
}
