<?php
/*
 * @author Winitrix
 * This is sample class for Photo album management.
 * Methods returning some SQL queries for your database.
 */
class PhotoQuery{

    public function GetQuery($query, $item){
        switch($query){
            case "EditPhoto": return $this->EditPhoto($item);
            case "AddPhoto": return $this->AddPhoto($item);
            case "DeletePhoto": return $this->DeletePhoto($item);
            case "getall" : return $this->GetAllPhotos();
            case "AddAlbum" : return $this->AddPhotoAlbum($item);
            case "EditAlbum" : return $this->EditPhotoAlbum($item);
            case "DeleteAlbum" : return $this->DeletePhotoAlbum($item);
        }
    }

    private function EditPhoto($photo){
        return 'update photos set description="'.
            $photo->GetDescription().'", picture="'.$photo->GetImage().'"
             , album="'.$photo->GetAlbum().'" WHERE id="'.$photo->GetId().'";';
    }

    private function AddPhoto($photo){
        return 'insert into photos(description,date,picture,album) VALUES(
        "'.$photo->GetDescription().'","'.time().'","'.
        $photo->GetImage().'","'.$photo->GetAlbum().'");';
    }

    private function DeletePhoto($id){
        return 'delete from photos where id="'.$id.'";';
    }

    private function GetAllPhotos(){
        return 'select * from photos';
    }

    private function AddCategory(){

    }

    private function EditCategory(){

    }

    private function DeleteCategory(){

    }

    private function AddPhotoAlbum($album){
        return 'insert into photo_album(description,date,picture,category) VALUES(
        "'.$album->GetDescription().'","'.time().'","'.
        $album->GetImage().'","'.$album->GetCategory().'");';
    }

    private function EditPhotoAlbum($album){
        return 'update photos set description="'.
        $album->GetDescription().'", picture="'.$album->GetImage().'"
             , album="'.$album->GetAlbum().'" WHERE id="'.$album->GetId().'";';
    }

    private function DeletePhotoAlbum($id){
        return 'DELETE FROM photo_album WHERE id="'. $id . '";';
    }
}
?>