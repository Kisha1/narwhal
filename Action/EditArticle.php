<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/ArticleModel.php';

if (isset($_POST['name']) && isset($_POST['survey']) && isset($_POST['description']) &&
        isset($_POST['picture']) && isset($_POST['category']) && isset($_POST['articles'])) {

    new EditArticle($_POST['name'], $_POST['survey'], $_POST['description'], $_POST['picture'], $_POST['category'], $_POST['articles']);
}

class EditArticle {

    private $db;

    public function EditArticle($name, $survey, $desc, $pic, $cat, $id) {
        $this->db = new Connection();
        $model = new ArticleModel($name, $survey, $desc, 0, "false", $pic, $cat);
        $model->SetId($id);
        $this->db->EditArticle($model);
    }

}

?>
