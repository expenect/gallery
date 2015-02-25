<?php
class template
{
    private $date = array();
    private $views_dir;

    public function __construct($views_dir)
    {
        $this->views_dir = $views_dir;
    }

    public function set($name, $description)
    {
        $this->date[$name]=$description;
    }

    public function __get($name)
    {
        if (isset($this->date[$name]))
            return $this->date[$name];
        return "";
    }

    public function delete($name)
    {
        unset($this->date[$name]);
    }

    public function display()
    {
        ob_start();
        include($this->views_dir."main.php");
        echo ob_get_clean();
    }
}