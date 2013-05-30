<?php
/**
* @author Kisha
* @class MenuQuery
*/
class MenuQuery {

    public function GetQuery($query, $menu) {
        switch ($query) {
            case "add" : return $this->AddMenuItem($menu);
            case "edit": return $this->EditMenuItem($menu);
            case "delete": return $this->DeleteMenuItem($menu);
            case "getall" : return $this->GetAllMenuItems();
            case "getlast" : return $this->GetLastPosition();
        }
    }

    private function AddMenuItem($menu) {
        return 'INSERT INTO menu (link,name,visibility,position)
            VALUES ("' . $menu->GetLink() . '", "' . $menu->GetName() . '",
                "' . $menu->GetVisibility() . '", "' . ($this->GetLastPosition() + 1) . '");';
    }

    // vrátí poslední pozici v menu
    private function GetLastPosition() {
        $LastPosition = mysql_fetch_row(mysql_query("SELECT position FROM menu ORDER BY position DESC LIMIT 0,1"));
        return $LastPosition[0];
    }

    private function EditMenuItem($menu) {
        return 'UPDATE menu SET link="' . $menu->GetLink() . '", name="'
                . $menu->GetName() . '", visibility="' . $menu->GetVisibility() .
                '", position="' . $menu->GetPosition() . '" WHERE id="' . $menu->GetId() . '";';
    }

    private function DeleteMenuItem($id) {
        return 'DELETE FROM menu WHERE id="' . $id . '";';
    }

    private function GetAllMenuItems() {
        return 'SELECT * FROM menu';
    }

}

?>