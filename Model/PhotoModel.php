<?php
/*
 * @author Winitrix
 */
class PhotoModel {

    private $picture;
    private $album;
    private $description;
    private $date;
    private $id;
    private $category;

    public function PhotoModel($pic, $album, $desc, $category = NULL){
        $this->picture = $pic;
        $this->album = $album;
        $this->description = $desc;
        $category === NULL ? NULL : $this->category = $category;
    }

    public function GetId(){
        return $this->id;
    }

    public function GetImage(){
        return $this->picture;
    }

    public function GetAlbum(){
        return $this->album;
    }

    public function GetDescription(){
        return $this->description;
    }

    public function GetDate(){
        return $this->date;
    }

    public function GetCategory(){
        return $this->category;
    }

    public function SetAlbum($album){
        $this->album = $album;
    }

    public function SetDate($date){
        $this->date = $date;
    }

    public function SetId($id){
        $this->id = $id;
    }

    public function SetCategory($cat){
        $this->category = $cat;
    }

}