<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/ArticleCategoryModel.php';

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['picture'])) {

    new AddArticleCategory($_POST['name'], $_POST['description'], $_POST['picture']);
}

class AddArticleCategory {

    private $db;

    public function AddArticleCategory($name, $desc, $pic) {
        $this->db = new Connection();
        $model = new ArticleCategoryModel($name, $desc, $pic, time());
        $this->db->AddArticleCategory($model);
    }

}

?>
