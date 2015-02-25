<?php
session_start();
require_once("../models/manage.php");
require_once("../config.php");
$config = new config();
$manage = new manage();
if ($manage->edit_photo($_POST)){
    $_SESSION['message']="Редагування виконано успішно!";

}
header("Location:".$config->link_site);
exit;
