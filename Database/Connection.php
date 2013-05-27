<?php

class Connection extends Query{
    
    public function Connection(){
        $database = mysql_connect("localhost", "root", "");
        if(!$database){
            die('Could not connect: ' . mysql_error());
        }
        mysql_select_db("narwhal");
    }
    
    public function Quit(){
        mysql_close();
    }
}

?>
