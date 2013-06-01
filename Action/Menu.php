<?php

require '../Database/SQL/MenuQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/MenuModel.php';

if (isset($_GET['method'])) {
    new Menu($_POST, $_GET['method']);
}

class Menu {

    private $db;
    private $query;

    public function Menu($post, $method) {
        switch ($method) {
            case "add": $this->AddMenuItem($post);
                break;
            case "edit": $this->EditMenuItem($post);
                break;
        }
    }

    private function AddMenuItem($post) {
        if (isset($post['link']) && isset($post['name']) && isset($post['visibility']) && isset($post['type'])) {
            $this->db = new Connection();
            $this->query = new MenuQuery();
            $model = new MenuModel($post['link'], $post['name'], $post['visibility'], $post['type'], ($this->query
                            ->GetQuery("getlast", NULL)));
            $this->db->AddMenuItem($model);
        }
    }

    private function EditMenuItem($post) {
        if (isset($post['link']) && isset($post['name']) && isset($post['visibility']) &&
                isset($post['type']) && isset($post['position']) && isset($post['nameselect'])) {
            $this->db = new Connection();
            $model = new MenuModel($post['link'], $post['name'], $post['visibility'], $post['type'], $post['position']);
            $model->SetId($post['nameselect']);
            $this->db->EditMenuItem($model);
        }
    }

}

?>
