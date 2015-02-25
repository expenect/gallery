<?php
require_once ("controllers/Cglobal_controller.php");
require_once ("models/model.php");

class Index extends CGlobal{

    public function getContent(){
        $model = new Model("photo");
        if (!$_GET['sort']){
            $this->template->set("photo", $model->getALL());
        }
        else{
            $this->template->set("photo", $model->getAll(trim (strip_tags ($_GET['sort']))));
        }
        return "index";
    }
}