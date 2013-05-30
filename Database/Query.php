<?php
/**
 * @author Winitrix
 * @class Query
 * Tohle je třída, která se dědí, tahle se bude používat na všechny SQL dotazy.
 * Bere si parametry z tříd jako je UserQuery, ArticleQuery.. prostě všechny
 * Query soubory, které vrací SQL dotazy do databáze. Potom co si vezme dotaz
 * odešle je do DB a vrací pole obsahu, který jsem chtěl. Ovšem pokud jsem chtěl
 * něco vem.. pokud jen přidávám a podobně tak nevrací nic.
 */
class Query {

    private $UserQuery;
    private $ArticleQuery;
    // @param account podívá se do databáze jestli údaje souhlasí (login)
    public function UserIsEmpty($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("Login", $account)));
    }
    // vrací uživatelské ID z databáze
    // očekává uživatelský učet SELECT id FROM users WHERE account="account";
    public function UserGetId($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("GetID", $account)));
    }
    // podívá se do databáze jestli tam už nějaká uživatel s takovým nickem
    // už neexistuje vrací array (registrace)
    public function FreeReg($account) {
        $this->UserQuery = new UserQuery();
        return mysql_fetch_array(mysql_query(
                        $this->UserQuery->GetQuery("FreeReg", $account)));
    }
    // přídá uživatele do databáze (registrace)
    // @param user user je objekt třídy UserModel
    public function AddUser($user) {
        $this->UserQuery = new UserQuery();
        mysql_query($this->UserQuery->GetQuery("Add", $user));
    }
    // metoda, která vrací absolutně všechny uživatele z databáze 
    // vrací pole objektů UserModel
    public function GetAllUsers() {
        $i = 0;
        $this->UserQuery = new UserQuery();
        $users = mysql_query(
                $this->UserQuery->GetQuery("GetAll", null));
        $array = array();
        while ($user = mysql_fetch_array($users)) {
            $array[$i] = new UserModel($user['name'], $user['surname'], $user['account'], $user['password'], $user['mail'], $user['birthday']);
            $array[$i]->SetId($user['id']);
            $i++;
        }
        return $array;
    }
    // přidá nový článek očekává objekt třídy ArticleModel
    public function AddArticle($article) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetQuery("add", $article));
    }
    // Upraví článek (očekává objekt třídy ArticleModel)
    public function EditArticle($article) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetQuery("edit", $article));
    }
    // smaže článek -> očekává ID článku
    public function DeleteArticle($id) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetQuery("delete", $id));
    }
    // vrací absolutně všechny články
    // vrací pole ArticleModelů
    public function GetAllArticles() {
        $i = 0;
        $this->ArticleQuery = new ArticleQuery();
        $articles = mysql_query(
                $this->ArticleQuery->GetQuery("getall", null));
        $array = array();
        while ($artc = mysql_fetch_array($articles)) {
            $array[$i] = new ArticleModel($artc['name'], $artc['survey'], $artc['description'], $artc['date'], $artc['is_show'], $artc['picture'], $artc['category']);
            $array[$i]->SetId($artc['id']);
            $i++;
        }
        return $array;
    }
    // přidá novou kategorii článků očekává ArticleCategoryModel objekt
    public function AddArticleCategory($category) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetCategoryQuery("add", $category));
    }
    // upraví kategorii článku očekává ArticleCategoryModel objekt
    public function EditArticleCategory($category) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetCategoryQuery("edit", $category));
    }
    // smaže kategorii-> očekává ID kategorie
    public function DeleteArticleCategory($id) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetCategoryQuery("delete", $id));
    }
    // vrací všechny kategorie
    public function GetAllArticlesCategoryes() {
        $i = 0;
        $this->ArticleQuery = new ArticleQuery();
        $articles = mysql_query(
                $this->ArticleQuery->GetCategoryQuery("getall", null));
        $array = array();
        while ($artc = mysql_fetch_array($articles)) {
            $array[$i] = new ArticleCategoryModel($artc['name'], $artc['description'], $artc['picture'], $artc['registration_date']);
            $array[$i]->SetId($artc['id']);
            $i++;
        }
        return $array;
    }
    /**
     * @param type $tag tag článku
     * @param type $article název článku
     * tahle metoda púoužívá privátní metodu AddTag($tag, $article)
     * podívá se do databáze jestli už tag neexistuje -> pokud neexistuje uloží si ho
     * a zavolá metodu AddTag($tag, $article)
     */
    public function GetExistsTag($tag, $article) {
        $this->ArticleQuery = new ArticleQuery();
        $dbtag = mysql_fetch_array(mysql_query($this->ArticleQuery->GetTagsQuery("exist", $tag)));
        if ($dbtag['name'] != $tag) {
            $this->AddTag($tag, $article);
        }
    }
    // uloží do databáze tag 
    // uloží do databaze articles_tags id tagu a jméno článku
    private function AddTag($tag, $article) {
        $this->ArticleQuery = new ArticleQuery();
        mysql_query($this->ArticleQuery->GetTagsQuery("add", $tag));
        $id = mysql_fetch_array(mysql_query($this->ArticleQuery->GetTagsQuery("getid", $tag)));
        mysql_query($this->ArticleQuery->AddTagArticles($article, $id['id']));
    }

}

?>