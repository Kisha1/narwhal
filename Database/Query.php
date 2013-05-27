<?php

class Query {

    private $UserQuery;

    public function UserIsEmpty($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("Login", $account)));
    }

    public function UserGetId($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("GetID", $account)));
    }

    public function FreeReg($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("FreeReg", $account)));
    }
    
    public function AddUser($user){
        $this->UserQuery = new UserQuery();
        mysql_query($this->UserQuery->SetQuery("add", $user));
    }

}

?>
