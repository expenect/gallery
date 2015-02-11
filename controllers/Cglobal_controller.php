<?
require_once("controllers/template_controller.php");
require_once("config.php");

abstract class CGlobal{

    private $config;
    private $template;

    public function __construct(){
        $this->config = new config();
        $this->template = new template($this->config->dir_template);
        $this->template->set("meta_desc", $this->meta_desc);
        $this->template->set("meta_key", $this->meta_key);
        $this->template->set("css", $this->config->dir_template.$this->config->dir_css);
        $this->template->set("title",$this->config->sitename);
        $this->template->set("content",$this->getContent());
        $this->template->display();
    }

    abstract function getContent();
}