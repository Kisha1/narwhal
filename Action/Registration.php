<?php

require '../Database/SQL/UserQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/UserModel.php';
require 'Encryption.php';

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['mail']) &&
        isset($_POST['account']) && isset($_POST['password']) && isset($_POST['password2'])) {

    new Registration($_POST['name'], $_POST['surname'], $_POST['account'], $_POST['password'], $_POST['password2'], $_POST['mail']);
}

class Registration {

    private $db;

    public function Registration($name, $sname, $acc, $pw, $pw2, $mail) {
        $this->db = new Connection();
        if ($pw != $pw2) return; // hesla se neshoduji
        if ($this->isEmpty($acc)) return; // uzivatel s timto jmenem uz existuje
        $enc = new Encryption($pw);
        $model = new UserModel($name, $sname, $acc, $enc->GetHash(), $mail, "1994-03-16");
        $this->db->AddUser($model);
    }

    private function isEmpty($account) {
        $acc = $this->db->FreeReg($account);
        if ($acc['account'] == $account) return true;
        else return false;
    }

}

?>
