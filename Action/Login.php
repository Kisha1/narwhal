<?php

session_start();

require '../Database/SQL/UserQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require 'Encryption.php';

if (isset($_POST['account']) && isset($_POST['password'])) {
    new Login($_POST['account'], $_POST['password']);
}

class Login {

    private $account;
    private $db;

    public function Login($account, $password) {
        $this->db = new Connection();
        $enc = new Encryption($password);
        $this->account = $account;
        $this->TryLogin($this->db->UserIsEmpty($account), $enc->GetHash());
    }

    private function TryLogin($dbpass, $password) {
        if ($dbpass['password'] == $password) {
            $id = $this->db->UserGetId($this->account);
            $this->SaveSessions($id);
        } else {
            // nejde se prihlasit
        }
    }

    private function SaveSessions($id) {
        $_SESSION['user'] = $id;
        header("Location:../homepage.php");
    }

}

?>