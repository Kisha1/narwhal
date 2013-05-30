<?php
/**
 * @author Winitrix
 * @class Connection
 * Tohle je jednoduchá třída, které se připojí do databáze. A pracuje sní
 * pomocí zděděné třídy Query.
 */
class Connection extends Query{
    /*
     * v budoucnu načte hodnoty ze souboru
     * a poté se na tu DB bude připojovat
     */
    public function Connection(){
        $database = mysql_connect("localhost", "root", "");
        if(!$database){
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("narwhal");
    }
    // metoda na ukončení spojení s databází
    public function Quit(){
        mysql_close();
    }
}

?>
