<?php

class UserQuery {

    public function GetQuery($query, $user) {
        switch ($query) {
            case "Login" : return $this->Login($user);
            case "GetID" : return $this->Id($user);
            case "FreeReg" : return $this->FreeReg($user);
        }
    }
    
    public function SetQuery($query, $user){
        switch($query){
            case "add": return $this->AddUser($user);
        }
    }
    
    private function AddUser($usermodel){
        return 'INSERT INTO users (name,surname,account,password,mail,birthday)
            VALUES("'.$usermodel->GetName().'","'.$usermodel->GetSurname().'","'.
                $usermodel->GetAcc().'","'.$usermodel->GetPassword().'","'.
                $usermodel->GetMail().'","'.$usermodel->GetBirthday().'");';
    }

    private function FreeReg($account) {
        return 'SELECT account FROM users WHERE account="' . $account . '";';
    }

    private function Login($account) {
        return 'SELECT password FROM users WHERE account="' . $account . '";';
    }

    private function Id($account) {
        return 'SELECT id FROM users WHERE account="' . $account . '";';
    }

}

?>
