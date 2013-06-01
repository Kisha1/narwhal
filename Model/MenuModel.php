<?php

/**
 * @author Kisha
 * @class MenuModel
 * Tato třída slouží pro správu menu.
 */
class MenuModel {

    private $link, $name, $visibility, $type, $position;
    private $id;

    /*
     * @param link url adresa odkazu
     * @param name název odkazu
     * @param visibility viditelnost (viditelnost = povolení / zakázání zobrazení pro určité uživatelské úrovně)
     * @param type typ umístění odkazu (horizontální nebo vertikální)
     * @param position pořadí odkazu
     */

    public function MenuModel($link, $name, $visibility, $type, $position) {
        $this->link = $link;
        $this->name = $name;
        $this->visibility = $visibility;
        $this->type = $type;
        $this->position = $position;
    }

    // vrací url adresu odkazu
    public function GetLink() {
        return $this->link;
    }

    // vrací název odkazu
    public function GetName() {
        return $this->name;
    }

    // vrací viditelnost odkazu
    public function GetVisibility() {
        return $this->visibility;
    }

    //vrací type odkazu
    public function GetType() {
        return $this->type;
    }

    // vrací číselné pořadí odkazu
    public function GetPosition() {
        return $this->position;
    }

    // vrací id
    public function GetId() {
        return $this->id;
    }

    // nastaví url odkaz
    public function SetLink($link) {
        $this->link = $link;
    }

    // nastaví název odkazu
    public function SetName($name) {
        $this->name = $name;
    }

    // nastaví viditelnost
    public function SetVisibility($visibility) {
        $this->visibility = $visibility;
    }

    // nastaví typ
    public function SetType($type) {
        $this->visibility = $type;
    }
    
    // nastaví pozici
    public function SetPosition($position) {
        $this->position = $position;
    }

    // nastaví id
    public function SetId($id) {
        $this->id = $id;
    }

}

?>