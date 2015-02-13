<?
require_once ("controllers/Cglobal_controller.php");
require_once ("models/model.php");

class Index extends CGlobal{

    public function getContent(){
        $model = new Model("photo");
        $this->template->set("photo",$model->getALL());
        return "index";
    }
}