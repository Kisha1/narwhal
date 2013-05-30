<?php
/**
 * @author Winitrix
 * @class UserModel
 * Tahle třída spravuje uživatele, z databáze příjde pole této třídy
 * při vypisování všech uživatelů, nebo pokud se lognu tak mám svojí vlastní
 * třídu UserModel a beru si z ní informace pomocí sessionu
 */
class UserModel {

    private $name, $surname, $mail, $birthday;
    private $account, $password, $id;
    /*
     * @param name jméno uživatele
     * @param surname příjmení uživatele
     * @param account název uživatelského účtu
     * @param password uživatelské heslo
     * @param mail emailová adresa uživatele
     * @param birthday narozeniny uživatele (yyyy-mm-dd)
     */
    public function UserModel($name, $surname, $account, $password, $mail, $birthday) {
        $this->name = $name;
        $this->surname = $surname;
        $this->mail = $mail;
        $this->birthday = $birthday;
        $this->account = $account;
        $this->password = $password;
    }
    // vrací reálné jméno uživatele
    public function GetName() {
        return $this->name;
    }
    // Metoda, která vrací ID uživatele v databázi ( nepřichází přes konstruktor
    // musí se doplňit přes metodu SetId($id)
    public function GetId(){
        return $this->id;
    }
    // vrací reálné příjmení uživatele
    public function GetSurname() {
        return $this->surname;
    }
    // vrací e-mailovou adresu uživatele
    public function GetMail() {
        return $this->mail;
    }
    // vrací přihlašovací jméno
    public function GetAcc() {
        return $this->account;
    }
    // vrací narozeniny (yyyy-mm-dd)
    public function GetBirthDay(){
        return $this->birthday;
    }
    // vrací heslo !TA TU BEJT NEMUSÍ! nikdy si heslo neberem
    public function GetPassword(){
        return $this->password;
    }
    // nastaví, změní jméno uživatele
    // @param name jméno uživatele
    public function SetName($name) {
        $this->name = $name;
    }
    // nastaví příjmení uživatele
    // @param surname reálné příjmení uživatele
    public function SetSurname($surname) {
        $this->surname = $surname;
    }
    // metoda pro změnu hesla
    // půjde použít i pro navrácení (proto existuje ta metoda GetPassword()
    public function SetPassword($pass) {
        $this->password = $pass;
    }
    // nastaví nový email
    public function SetMail($mail) {
        $this->mail = $mail;
    }
    // nastaví nové narozeniny (yyyy-mm-dd)
    public function SetBirthday($birthday){
        $this->birthday = $birthday;
    }
    // nastaví ID (id se nenastavuje hned z DB do konstruktoru)
    // existuje tam metoda, které ID nastaví mimo konstruktor
    // protože registrovaní uživatelé ještě nemají ID a do konstruktoru
    // by se musel psát jenom NULL místo ID
    public function SetId($id){
        $this->id = $id;
    }

}

?>
