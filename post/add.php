<?
session_start();
require_once("../models/manage.php");
require_once("../config.php");
$config = new config();
$manage = new manage();
if ($manage->add_photo($_POST)){
    $_SESSION['message']="Фото добавлено";
    unset($_SESSION["description"]);
}
header("Location:".$config->link_site);
exit;
?>