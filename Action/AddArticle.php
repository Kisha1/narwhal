<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/ArticleModel.php';

if (isset($_POST['name']) && isset($_POST['survey']) && isset($_POST['description']) &&
        isset($_POST['picture']) && isset($_POST['category']) && isset($_POST['tag'])) {

    new AddArticle($_POST['name'], $_POST['survey'], $_POST['description'], $_POST['picture'], $_POST['category'], $_POST['tag']);
}

class AddArticle {

    private $db;

    public function AddArticle($name, $survey, $desc, $pic, $cat, $tags) {
        $this->db = new Connection();
        $model = new ArticleModel($name, $survey, $desc, time(), "false", $pic, $cat);
        $this->db->AddArticle($model);
        $this->AddTag($name, $tags);
    }

    private function AddTag($name, $tags) {
        $tag = explode(",", $tags);
        foreach ($tag AS $value) {
            $this->db->GetExistsTag($value, $name);
        }
    }

}

?>
