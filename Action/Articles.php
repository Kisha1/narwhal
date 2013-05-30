<?php

require '../Database/SQL/ArticleQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/ArticleModel.php';
require '../Model/ArticleCategoryModel.php';

if (isset($_GET['method'])) {
    new Articles($_POST, $_GET['method']);
}

class Articles {

    private $db;
    // porovnání hodnot co mi příjdou v GETu
    public function Articles($post, $method) {
        switch ($method) {
            case "add":
                $this->AddArticles($post);
                break;
            case "edit":
                $this->EditArticle($post);
                break;
            case "delete":
                $this->DeleteArticle($post);
                break;
            case "addcat":
                $this->AddArticleCategory($post);
                break;
            case "editcat":
                $this->EditArticleCategory($post);
                break;
            case "deletecat":
                $this->DeleteArticleCategory($post);
                break;
        }
    }
    // Editace kategorie článků
    private function EditArticleCategory($post) {
        if (isset($post['name']) && isset($post['description']) &&
                isset($post['picture']) &&
                isset($post['articles'])) {
            $this->db = new Connection();
            $model = new ArticleCategoryModel($post['name'], $post['description'], $post['picture'], 0);
            $model->SetId($post['articles']);
            $this->db->EditArticleCategory($model);
        }
    }
    // přidání nové kategorie článků
    private function AddArticleCategory($post) {
        if (isset($post['name']) && isset($post['description']) && isset($post['picture'])) {
            $this->db = new Connection();
            $model = new ArticleCategoryModel($post['name'], $post['description'], $post['picture'], time());
            $this->db->AddArticleCategory($model);
        }
    }
    // smazání kategorie článků
    private function DeleteArticleCategory($post) {
        if (isset($post['articles'])) {
            $this->db = new Connection();
            $this->db->DeleteArticleCategory($post['articles']);
        }
    }
    // smazání celého článku
    private function DeleteArticle($post) {
        if (isset($post['articles'])) {
            $this->db = new Connection();
            $this->db->DeleteArticle($post['articles']);
        }
    }
    // editace článku
    private function EditArticle($post) {
        if (isset($post['name']) && isset($post['survey']) && isset($post['description']) &&
                isset($post['picture']) && isset($post['category']) && isset($post['articles'])) {
            $this->db = new Connection();
            $model = new ArticleModel($post['name'], $post['survey'], $post['description'], 0, "false", $post['picture'], $post['category']);
            $model->SetId($post['articles']);
            $this->db->EditArticle($model);
        }
    }
    // přidání nového článku
    private function AddArticles($post) {
        if (isset($post['name']) && isset($post['survey']) && isset($post['description']) &&
                isset($post['picture']) && isset($post['category']) && isset($post['tag'])) {

            $this->db = new Connection();
            $model = new ArticleModel($post['name'], $post['survey'], $post['description'], time(), "false", $post['picture'], $post['category']);
            $this->db->AddArticle($model);
            $this->AddTag($post['name'], $post['tag']);
        }
    }
    // přidání tagu
    private function AddTag($name, $tags) {
        $tag = explode(",", $tags);
        foreach ($tag AS $value) {
            $this->db->GetExistsTag($value, $name);
        }
    }

}
?>
