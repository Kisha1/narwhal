<?php

require '../Database/SQL/MenuQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/MenuModel.php';

if (isset($_POST['link']) && isset($_POST['name']) && isset($_POST['visibility'])) {

    new AddMenuItem($_POST['link'], $_POST['name'], $_POST['visibility']);
}

class AddMenuItem {

    private $db;
    private $query;

    public function AddMenuItem($link, $name, $visibility) {
        $this->db = new Connection();
        $this->query = new MenuQuery();
        $model = new MenuModel($link, $name, $visibility, ($this->query
                        ->GetQuery("getlast", NULL)));
        $this->db->AddMenuItem($model);
    }

}

?>