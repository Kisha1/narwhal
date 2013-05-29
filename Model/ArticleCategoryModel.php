<?php

class ArticleCategoryModel {

    private $name, $desc, $pic;
    private $date, $id;

    public function ArticleCategoryModel($name, $desc, $pic, $date) {
        $this->name = $name;
        $this->desc = $desc;
        $this->pic = $pic;
        $this->date = $date;
    }

    public function GetName() {
        return $this->name;
    }

    public function GetDescription() {
        return $this->desc;
    }

    public function GetImage() {
        return $this->pic;
    }

    public function GetId() {
        return $this->id;
    }

    public function GetDate() {
        return $this->date;
    }

    public function SetId($id) {
        $this->id = $id;
    }

    public function SetName($name) {
        $this->name = $name;
    }

    public function SetDescription($desc) {
        $this->desc = $desc;
    }

    public function SetImage($img) {
        $this->pic = $img;
    }

}

?>
