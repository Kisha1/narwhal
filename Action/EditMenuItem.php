<?php

require '../Database/SQL/MenuQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/MenuModel.php';

if(isset($_POST['link']) && isset($_POST['name']) && isset($_POST['visibility']) && 
        isset($_POST['position']) && isset($_POST['nameselect'])) {
    
    new EditMenuItem($_POST['link'], $_POST['name'], $_POST['visibility'], $_POST['position'], $_POST['nameselect']);
    
}

class EditMenuItem {

    private $db;

    public function EditMenuItem($link, $name, $visibility, $position, $id) {
        $this->db = new Connection();
        $model = new MenuModel($link, $name, $visibility, $position);
        $model->SetId($id);
        $this->db->EditMenuItem($model);
    }

}

?>