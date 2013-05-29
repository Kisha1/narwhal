<?php

class ArticleQuery {

    public function GetQuery($query, $article) {
        switch($query){
            case "add" : return $this->AddArticle($article);
            case "edit": return $this->EditArticle($article);
            case "delete": return $this->DeleteArticle($article);
            case "getall" : return $this->GetAllArticles();
        }
    }
    
    public function GetCategoryQuery($query, $category){
        switch($query){
            case "add": return $this->AddArticleCategory($category);
            case "edit" : return $this->EditArticlesCategory($category);
            case "delete" : return $this->DeleteArticlesCategory($category);
            case "getall" : return $this->GetAllArticlesQuery();
        }
    }
    
    private function EditArticle($article){
        return 'UPDATE articles SET name="'.$article->GetName().'", survey="'
            .$article->GetSurvey().'", description="'.$article->GetDescription().
            '", picture="'.$article->GetImage().'", category="'.$article->GetCategory().
            '" WHERE id="'.$article->GetId().'";';
    }
    
    private function DeleteArticle($id){
        return 'DELETE FROM articles WHERE id="'.$id.'";';
    }
    
    private function AddArticle($article){
        return 'INSERT INTO articles (name,survey,description,picture,category,date,is_show)
            VALUES("'.$article->GetName().'","'.$article->GetSurvey().'","'.$article->GetDescription()
                .'","'.$article->GetImage().'","'.$article->GetCategory().'","'.time().'","false");';
    }
    
    private function GetAllArticles(){
        return 'SELECT * FROM articles;';
    }
   
    private function GetAllArticlesQuery(){
        return 'SELECT * FROM articles_category;';
    }
    
    private function AddArticleCategory($category){
        return 'INSERT INTO articles_category(name,description,picture,registration_date)
            VALUES("'.$category->GetName().'","'.$category->GetDescription().
                '","'.$category->GetImage().'","'.$category->GetDate().'");';
    }
    
    private function EditArticlesCategory($category){
        return 'UPDATE articles_category SET name="'.$category->GetName().
                '", description="'.$category->GetDescription().'", picture="'.
                $category->GetImage().'" WHERE id="'.$category->GetId().'";';
    }
    
    private function DeleteArticlesCategory($id){
        return 'DELETE FROM articles_category WHERE id="'.$id.'";';
    }

}
?>