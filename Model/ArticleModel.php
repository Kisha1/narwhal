<?php
/**
 * @author Winitrix
 * @class ArticleModel
 * Tahle třída spravuje články, z databáze příjde pole této třídy
 * při vypisování všech článku např. Pomocí této třídy se články vytvářejí
 * a taky upravují samozřejmě vypisujou atd...
 */
class ArticleModel {

    private $name, $survey, $desc, $date;
    private $is_show, $picture, $category;
    private $id;
    /*
     * @param name jméno článku
     * @param survey krátký popisek článku
     * @param desc kompletní popis alias tělo článku
     * @param date datum vytvoření článku (INTEGER)
     * @param is_show boolean->jestli je rozkliknutý nebo ne
     * @param picture obrázek článku
     * @param category obsahuje, do které kategorie článku spadá tento článek
     */
    public function ArticleModel($name, $survey, $desc, $date, $is_show, $picture, $category) {
        $this->name = $name;
        $this->survey = $survey;
        $this->desc = $desc;
        $this->is_show = $is_show;
        $this->picture = $picture;
        $this->category = $category;
        $this->date = $date;
    }
    // vrací jméno článku
    public function GetName() {
        return $this->name;
    }
    // vrací krátký popisek článku
    public function GetSurvey() {
        return $this->survey;
    }
    // vrací celý popis článku
    public function GetDescription() {
        return $this->desc;
    }
    // vrací datum vytvoření článku
    public function GetDate() {
        return $this->date;
    }
    // vrací boolean jestli je viditelný nebo není
    public function isShow() {
        return $this->is_show;
    }
    // vrací obrázek článku
    public function GetImage() {
        return $this->picture;
    }
    // vrací kategorii, do které spadá
    public function GetCategory() {
        return $this->category;
    }
    // vrací ID článku
    public function GetId() {
        return $this->id;
    }
    // nastaví, změní jméno článku (EDIT)
    public function SetName($name) {
        $this->name = $name;
    }
    // nastaví, změni krátký popisek článku (EDIT)
    public function SetSurvey($survey) {
        $this->survey = $survey;
    }
    // nastaví, změní tělo článku (EDIT)
    public function SetDescription($desc) {
        $this->desc = $desc;
    }
    // nastaví, změní obrázek článku (EDIT)
    public function SetImage($img) {
        $this->picture = $img;
    }
    // nastaví, změní kategorii článku
    public function SetCategory($cat) {
        $this->category = $cat;
    }
    // nastaví jestli je viditelný nebo ne (boolean, EDIT)
    public function SetShow($show) {
        $this->is_show = $show;
    }
    // nastaví ID článku (nepoužívá se na edit ale na nastavní id z DB
    // stejně jako u uživatelů)
    public function SetId($id) {
        $this->id = $id;
    }

}

?>
