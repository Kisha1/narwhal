<?php

class Query {

    private $UserQuery;
    private $ArticleQuery;

    public function UserIsEmpty($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("Login", $account)));
    }

    public function UserGetId($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("GetID", $account)));
    }

    public function FreeReg($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("FreeReg", $account)));
    }

    public function AddUser($user) {
        $this->UserQuery = new UserQuery();
        mysql_query($this->UserQuery->SetQuery("add", $user));
    }

    public function GetAllUsers() {
        $i = 0;
        $this->UserQuery = new UserQuery();
        $users = mysql_query(
                $this->UserQuery->GetQuery("GetAll", null));
        $array = array();
        while ($user = mysql_fetch_array($users)) {
            $array[$i] = new UserModel($user['name'], $user['surname'], 
                    $user['account'], $user['password'], $user['mail'], $user['birthday']);
            $array[$i]->SetId($user['id']);
            $i++;
        }
        return $array;
    }

    public function AddArticle($article) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetQuery("add", $article));
    }
    
    public function EditArticle($article){
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetQuery("edit", $article));
    }
    
    public function DeleteArticle($id){
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetQuery("delete", $id));
    }

    public function GetAllArticles() {
        $i = 0;
        $this->ArticleQuery = new ArticleQuery();
        $articles = mysql_query(
                $this->ArticleQuery->GetQuery("getall", null));
        $array = array();
        while ($artc = mysql_fetch_array($articles)) {
            $array[$i] = new ArticleModel($artc['name'], $artc['survey'], 
                    $artc['description'], $artc['date'], $artc['is_show'],
                    $artc['picture'], $artc['category']);
            $array[$i]->SetId($artc['id']);
            $i++;
        }
        return $array;
    }
    
    public function AddArticleCategory($category){
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetCategoryQuery("add", $category));
    }
    
    public function EditArticleCategory($category){
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetCategoryQuery("edit", $category));
    }
    
    public function DeleteArticleCategory($id){
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetCategoryQuery("delete", $id));
    }
    
    public function GetAllArticlesCategoryes(){
        $i = 0;
        $this->ArticleQuery = new ArticleQuery();
        $articles = mysql_query(
                $this->ArticleQuery->GetCategoryQuery("getall", null));
        $array = array();
        while ($artc = mysql_fetch_array($articles)) {
            $array[$i] = new ArticleCategoryModel($artc['name'], $artc['description'], 
                    $artc['picture'], $artc['registration_date']);
            $array[$i]->SetId($artc['id']);
            $i++;
        }
        return $array;
    }

}

?>