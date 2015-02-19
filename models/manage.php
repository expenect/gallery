<?
require_once ("database.php");
require_once ("model.php");
class manage{

    private $data = array();
    private $dir_img;

    public function __construct(){
        $config = new config();
        $this->dir_img="../".$config->dir_template.$config->dir_img;
    }

    public function add_photo($data){
        session_start();
        $flag = true;
        $this->data["description"] = $data ["description"];
        $this->data["img"] = $_FILES["img"];
        $_SESSION["description"] = $data["description"];

        if ($this->data["description"] == "" || $this->data["img"]["name"]=="") {
            $_SESSION['message'] = "Заповніть будь-ласка усі поля!";
            return false;
        }

        $flag = $this->load_img($this->data["img"]);

        if ($flag){
            if(!$this->add_record()){
                $_SESSION["message"] = "Помилка при додані запису!";
                $flag = false;
            }
        }

        return $flag;
    }

    public function add_record(){
        $this->data["date"] = date("y-m-d");
        $model = datebase::getDB();
        $query = "INSERT INTO  `gallery`.`photo` (`id` ,url ,description ,date ,size) VALUES (NULL ,  '".$this->data['img']."',  '".$this->data['description']."',  '".$this->data['date']."',  '".$this->data['size']."');";
        if (!$model->query($query)){
            return false;
        }
        return true;
    }

    public function set($item ,$date){
        $this->data[$item] = $date;
    }

    public function edit_photo($data){
        $this->data=$data;
        $img = $_FILES["img_edit"];
        $this->data['img'] = $data["url_photo"];
        if ($this->data["description_edit"] == "") {
            $_SESSION['message'] = "Поле опису виявилося пустим!";
            return false;
        }

        if (!$img["name"]==""){
            if (!$this->load_img($_FILES["img_edit"])){
                return false;
            }

            if ($this->data["url_photo"]!="" && file_exists($this->dir_img.$this->data["url_photo"])){
                unlink ("../template/img/".$this->data["url_photo"]);
            }
        }

        $model = datebase::getDB();
        $query=("UPDATE  `gallery`.`photo` SET  `description` =  '".$this->data['description_edit']."', `url` = '".$this->data['img']."',`size`='".$this->data['size']."'  WHERE  `photo`.`id` =".$this->data['id'].";");
        if (!$model->query($query)){
            $_SESSION["message"] = "Помилка при редагувані запису!";
            return false;
        }
        return true;
    }

    public function delete_photo($id){
        $model = new Model("photo");
        $data = $model->getID($id);
        $file_url = $this->dir_img.$data[0]["url"];
        if (file_exists($file_url)){
            unlink($file_url);
        }
        $model = datebase::getDB();
        $model->query("DELETE FROM `gallery`.`photo` WHERE `photo`.`id` = ".$id);

        return true;
    }

    public function load_img($img){
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