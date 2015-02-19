<?
session_start();
require_once("../models/manage.php");
require_once("../config.php");
$config = new config();
$manage = new manage();

if (isset($_POST['no'])){
    $_SESSION['message']="Видалення відмінене!";
    header("Location:".$config->link_site);
    exit;
}

if ($manage->delete_photo($_POST['id'])){
    $_SESSION['message']="Видалення виконано успішно!";
    
}
header("Location:".$config->link_site);
exit;
