<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';

if (isset($_POST['articles'])) {
    new DeleteArticleCat($_POST['articles']);
}

class DeleteArticleCat {

    private $db;

    public function DeleteArticleCat($id) {
        $this->db = new Connection();
        $this->db->DeleteArticleCategory($id);
    }

}

?>
