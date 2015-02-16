<?
require_once ("controllers/Cglobal_controller.php");
require_once ("models/model.php");

class delete extends CGlobal{

    public function getContent(){
        if (!$_GET["id"]){
           header ("location:".$this->config->link_site);
        }

        $model = new Model("photo");
        $this->template->set("data_del", $model->getID($_GET["id"]));

        return "delete";
    }
}