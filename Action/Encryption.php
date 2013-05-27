<?php

class Encryption{
    
    private $hash;
    
    public function Encryption($password){
        $salt = "A4P02sa56wq4e6qw1qw6f4q8w16dq";
        $this->hash = sha1($salt . $password);
    }
    
    public function GetHash(){
        return $this->hash;
    }
}
?>
