<?php

class ArticleModel {

    private $name, $survey, $desc, $date;
    private $is_show, $picture, $category;
    private $id;
    
    public function ArticleModel($name, $survey, $desc, $date, $is_show, $picture, $category) {
        $this->name = $name;
        $this->survey = $survey;
        $this->desc = $desc;
        $this->is_show = $is_show;
        $this->picture = $picture;
        $this->category = $category;
        $this->date = $date;
    }
    
    public function GetName(){
        return $this->name;
    }
    
    public function GetSurvey(){
        return $this->survey;
    }
    
    public function GetDescription(){
        return $this->desc;
    }
    
    public function GetDate(){
        return $this->date;
    }
    
    public function isShow(){
        return $this->is_show;
    }
    
    public function GetImage(){
        return $this->picture;
    }
    
    public function GetCategory(){
        return $this->category;
    }
    
    public function GetId(){
        return $this->id;
    }
    
    public function SetName($name){
        $this->name = $name;
    }
    
    public function SetSurvey($survey){
        $this->survey = $survey;
    }
    
    public function SetDescription($desc){
        $this->desc = $desc;
    }
    
    public function SetImage($img){
        $this->picture = $img;
    }
    
    public function SetCategory($cat){
        $this->category = $cat;
    }
    
    public function SetShow($show){
        $this->is_show = $show;
    }
    
    public function SetId($id){
        $this->id = $id;
    }

}

?>
