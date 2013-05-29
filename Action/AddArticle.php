<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/ArticleModel.php';

if (isset($_POST['name']) && isset($_POST['survey']) && isset($_POST['description']) &&
        isset($_POST['picture']) && isset($_POST['category'])) {

    new AddArticle($_POST['name'], $_POST['survey'], $_POST['description'], $_POST['picture'], $_POST['category']);
}

class AddArticle {

    private $db;

    public function AddArticle($name, $survey, $desc, $pic, $cat) {
        $this->db = new Connection();
        $model = new ArticleModel($name, $survey, $desc, time(), "false", $pic, $cat);
        $this->db->AddArticle($model);
    }

}

?>
