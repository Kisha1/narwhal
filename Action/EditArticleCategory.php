<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/ArticleCategoryModel.php';

if (isset($_POST['name']) && isset($_POST['description']) &&
        isset($_POST['picture'])&&
        isset($_POST['articles'])) {

    new EditArticleCat($_POST['name'], $_POST['description'], $_POST['picture'], $_POST['articles']);
}

class EditArticleCat {

    private $db;

    public function EditArticleCat($name, $desc, $pic, $id) {
        $this->db = new Connection();
        $model = new ArticleCategoryModel($name, $desc, $pic, 0);
        $model->SetId($id);
        $this->db->EditArticleCategory($model);
    }

}

?>
