<?php

/**
 * @author Winitrix
 * @class UserQuery
 * Jednoduchá třída, která vrací SQL dotazy. Potom jí nahradím knihovnou.
 */
class UserQuery {

    /**
     *
     * @param type $user uživatel většinou UserModel objekt
     */
    public function GetQuery($query, $user) {
        switch ($query) {
            case "Login" : return $this->Login($user);
            case "GetID" : return $this->Id($user);
            case "FreeReg" : return $this->FreeReg($user);
            case "GetAll" : return $this->GetAll();
            case "Add": return $this->AddUser($user);
        }
    }
    // vrací SQL dotaz na přídání uživatele
    private function AddUser($usermodel) {
        $ip = $_SERVER['REMOTE_ADDR'];
        return 'INSERT INTO users (name,surname,account,password,mail,birthday,
            registration_date,admin_lvl,ban,ban_duration,last_login,ip) VALUES("'
        . $usermodel->GetName() . '","' . $usermodel->GetSurname() . '","'
        . $usermodel->GetAcc() . '","' . $usermodel->GetPassword() . '","' .
        $usermodel->GetMail() . '","' . $usermodel->GetBirthday() . '","'
        . time() . '","uuu","false","0","0","' . $ip . '");';
    }
    // vrací dotaz jestli už uživatel neexistuje
    private function FreeReg($account) {
        return 'SELECT account FROM users WHERE account="' . $account . '";';
    }
    // vrací dotaz, který zjistí jestli se schodují pass s loginem
    private function Login($account) {
        return 'SELECT password FROM users WHERE account="' . $account . '";';
    }
    // vrací sql dotaz, která zjistí id uživatele
    private function Id($account) {
        return 'SELECT id FROM users WHERE account="' . $account . '";';
    }
    // vrací SQL dotaz, který zjisti všechny uživatele
    private function GetAll() {
        return 'SELECT * FROM users;';
    }

}

?>
