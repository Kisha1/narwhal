<?php

class UserModel {

    private $name, $surname, $mail, $birthday;
    private $account, $password;

    public function UserModel($name, $surname, $account, $password, $mail, $birthday) {
        $this->name = $name;
        $this->surname = $surname;
        $this->mail = $mail;
        $this->birthday = $birthday;
        $this->account = $account;
        $this->password = $password;
    }
    // GETTERY
    public function GetName() {
        return $this->name;
    }

    public function GetSurname() {
        return $this->surname;
    }

    public function GetMail() {
        return $this->mail;
    }

    public function GetAcc() {
        return $this->account;
    }
    
    public function GetBirthDay(){
        return $this->birthday;
    }
    
    public function GetPassword(){
        return $this->password;
    }
    // SETTERY
    public function SetName($name) {
        $this->name = $name;
    }

    public function SetSurname($surname) {
        $this->surname = $surname;
    }

    public function SetPassword($pass) {
        $this->password = $pass;
    }

    public function SetMail($mail) {
        $this->mail = $mail;
    }
    
    public function SetBirthday($birthday){
        $this->birthday = $birthday;
    }

}

?>
