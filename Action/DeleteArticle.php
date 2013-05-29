<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/ArticleModel.php';

if (isset($_POST['articles'])) {
    new AddArticle($_POST['articles']);
}

class AddArticle {

    private $db;

    public function AddArticle($id) {
        $this->db = new Connection();
        $this->db->DeleteArticle($id);
    }

}

?>
