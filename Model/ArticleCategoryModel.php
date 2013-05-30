<?php
/**
 * @author Winitrix
 * @class ArticleCategoryModel
 * Tahle třída spravuje kategorie článků, lze je getovat, mazat, upravovat atd.
 */
class ArticleCategoryModel {

    private $name, $desc, $pic;
    private $date, $id;
    /*
     * @param name jméno kategorie
     * @param desc popis kategorie
     * @param pic obrázek kategorie
     * @param date datum vytvoření kategorie (INTEGER)
     */
    public function ArticleCategoryModel($name, $desc, $pic, $date) {
        $this->name = $name;
        $this->desc = $desc;
        $this->pic = $pic;
        $this->date = $date;
    }
    // vrací jméno kategorie
    public function GetName() {
        return $this->name;
    }
    // vrací popisek kategorie
    public function GetDescription() {
        return $this->desc;
    }
    // vrací obrázek kategorie
    public function GetImage() {
        return $this->pic;
    }
    // vrací id kategorie
    public function GetId() {
        return $this->id;
    }
    // vrací datum vytvoření kategorie
    public function GetDate() {
        return $this->date;
    }
    // nastaví ID kategorie
    public function SetId($id) {
        $this->id = $id;
    }
    // nastaví jméno kategorie (EDIT)
    public function SetName($name) {
        $this->name = $name;
    }
    // nastaví popis kategorie (EDIT)
    public function SetDescription($desc) {
        $this->desc = $desc;
    }
    // nastaví obrázek kategorie (EDIT)
    public function SetImage($img) {
        $this->pic = $img;
    }

}

?>
