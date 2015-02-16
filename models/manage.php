<?
require_once ("database.php");

class manage{

    private $data = array();

    public function add_photo($data){
        session_start();
        $flag = true;
        $this->data["description"] = $data ["description"];
        $this->data["date"] = date("y-m-d");
        $this->data["img"] = $_FILES["img"];
        $_SESSION["description"] = $data["description"];

        if ($this->data["description"] == "" || $this->data["img"]["name"]=="") {
            $_SESSION['message'] = "Заповніть будь-ласка усі поля!";
            return false;
        }

        $flag = $this->load_img($this->data["img"]);

        if ($flag){
            $model = datebase::getDB();
            $query = "INSERT INTO  `gallery`.`photo` (`id` ,url ,description ,date ,size) VALUES (NULL ,  '".$this->data['img']."',  '".$this->data['description']."',  '".$this->data['date']."',  '".$this->data['size']."');";
            if (!$model->query($query)){
                $_SESSION["message"] = "Ошибка в запросе";
                $flag = false;
            }
        }

        return $flag;
    }

    private function load_img($img){
        $file_name = $img["name"];
        $type = strtolower(substr($file_name, 1 + strrpos($file_name, ".")));
        if ($type=="jpg" || $type=="jpeg" || $type=="png");
        else {
            $_SESSION["message"] = "Невірний тип файлу, можливо завантажувати лише jpeg,jpg,png.";
            return false;
        }

        if ($img["size"]>1000000){
            $_SESSION["message"] = "Розмір картинки перевищено! Максимально можливий 1мб.";
            return false;
        }

        if (!file_exists($img["tmp_name"])){
            $_SESSION["message"] = "Файлу не існує на диску.";
            return false;
        }

        $new_name = 'photo_'.time().'_'.rand(1, 100).'.'.$type;
        copy($img["tmp_name"], "../template/img/index/".$new_name);

        $this->data["img"] = "index/".$new_name;
        $this->data["size"] = $img["size"];
        return true;
    }
}