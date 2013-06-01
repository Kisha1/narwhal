<?php
/**
 * @author Winitrix
 * @class ArticleQuery
 * Jednoduchá třída, která vrací SQL dotazy. Potom jí nahradím knihovnou.
 */
class ArticleQuery {
    // public metoda která očekává string a článek většinou je to 
    // objekt třídy ArticleModel nebo jen id
    // používá se na dotazy čistě článků!
    public function GetQuery($query, $article) {
        switch ($query) {
            case "add" : return $this->AddArticle($article);
            case "edit": return $this->EditArticle($article);
            case "delete": return $this->DeleteArticle($article);
            case "getall" : return $this->GetAllArticles();
        }
    }
    // public metoda, která se používá na vracení SQL dotazů na kategorie článků
    public function GetCategoryQuery($query, $category) {
        switch ($query) {
            case "add": return $this->AddArticleCategory($category);
            case "edit" : return $this->EditArticlesCategory($category);
            case "delete" : return $this->DeleteArticlesCategory($category);
            case "getall" : return $this->GetAllArticlesQuery();
        }
    }
    // public metoda, která se používá na vracení SQL dotazů pro práci s tagama
    public function GetTagsQuery($query, $tag) {
        switch ($query) {
            case "exist": return $this->ExistTag($tag);
            case "add": return $this->AddTag($tag);
            case "getid" : return $this->GetTagId($tag);
        }
    }
    // upraví článek očekává objekt třídy ArticleModel
    private function EditArticle($article) {
        return 'UPDATE articles SET name="' . $article->GetName() . '", survey="'
        . $article->GetSurvey() . '", description="' . $article->GetDescription() .
        '", picture="' . $article->GetImage() . '", category="' . $article->GetCategory() .
        '" WHERE id="' . $article->GetId() . '";';
    }
    // smaže článek očekává id článku
    private function DeleteArticle($id) {
        return 'DELETE FROM articles WHERE id="' . $id . '";';
    }
    // přídá novej článek očekává objekt třídy ArticleModel
    private function AddArticle($article) {
        return 'INSERT INTO articles (name,survey,description,picture,category,date,is_show)
            VALUES("' . $article->GetName() . '","' . $article->GetSurvey() . '","' . $article->GetDescription()
        . '","' . $article->GetImage() . '","' . $article->GetCategory() . '","' . time() . '","false");';
    }
    // vrátí všechny články
    private function GetAllArticles() {
        return 'SELECT * FROM articles;';
    }
    // vratí všechny kategorie článků
    private function GetAllArticlesQuery() {
        return 'SELECT * FROM articles_category;';
    }
    // přidá kategorii článků očekává objekt třídy ArticleCategoryModel
    private function AddArticleCategory($category) {
        return 'INSERT INTO articles_category(name,description,picture,registration_date)
            VALUES("' . $category->GetName() . '","' . $category->GetDescription() .
        '","' . $category->GetImage() . '","' . $category->GetDate() . '");';
    }
    // edituje kategorii článku očekává objekt třídy ArticleCategoryModel
    private function EditArticlesCategory($category) {
        return 'UPDATE articles_category SET name="' . $category->GetName() .
        '", description="' . $category->GetDescription() . '", picture="' .
        $category->GetImage() . '" WHERE id="' . $category->GetId() . '";';
    }
    // smaže kategorii článků očekává IDčko
    private function DeleteArticlesCategory($id) {
        return 'DELETE FROM articles_category WHERE id="' . $id . '";';
    }
    // podívá se jestli tag už neexistuje očekává jméno tagu
    private function ExistTag($tag) {
        return 'SELECT name FROM tags WHERE name="' . $tag . '";';
    }
    // vrací tag id očekává jméno tagu
    private function GetTagId($name) {
        return 'SELECT id FROM tags WHERE name="' . $name . '";';
    }
    // přidá tag očekává jeho jméno
    private function AddTag($tag) {
        return 'INSERT INTO tags (name) VALUES("' . $tag . '");';
    }
    // přidá novej tag do articles_tags (idčko tagu a jméno článku)
    public function AddTagArticles($articlename, $tagId) {
        return 'INSERT INTO articles_tags (tag_id,article_name) VALUES("' . $tagId .
        '","' . $articlename . '");';
    }

}

?>