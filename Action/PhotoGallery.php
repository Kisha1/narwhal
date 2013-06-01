<?php

require '../Database/SQL/PhotoQuery.php';
require '../Database/Query.php';
require '../Database/Connection.php';
require '../Model/PhotoModel.php';

if (isset($_GET['method'])) {
    new PhotoGallery($_POST, $_GET['method']);
}

class PhotoGallery {

    private $db;
    private $query;

    public function PhotoGallery($post,$method){
        switch($method){
            case "addphoto": $this->AddPhoto($post);
                break;
            case "editphoto": $this->EditPhoto($post);
                break;
            case "deletephoto": $this->DeletePhoto($post);
        }
    }

    private function AddPhoto($post){
        if(isset($post['description']) && isset($post['picture'])){
            $this->db = new Connection();
            $this->query = new PhotoQuery();
            $model = new PhotoModel($post['picture'], $post['album'], $post['description']);
            $this->db->AddPhoto($model);
        }
    }

    private function EditPhoto($post){
        if(isset($post['description']) && isset($post['picture'])){
            $this->db = new Connection();
            $this->query = new PhotoQuery();
            $model = new PhotoModel($post['picture'], $post['album'],  $post['description']);
            $model->SetId($post['photos']);
            $this->db->EditPhoto($model);
        }
    }

    private function DeletePhoto($post){
        if(isset($post['photos'])){
            $this->db = new Connection();
            $this->query = new PhotoQuery();
            $this->db->DeletePhoto($post['photos']);
        }
    }

}

?>
