<?php
require_once("../models/manage.php");
require_once("../config.php");
if ($_POST["description"]!="" && $_FILES["img"]["name"]!="") {
	$manage = new manage();
	$manage->set("description", $_POST["description"]);
	$manage->load_img($_FILES["img"]);
	$manage->add_record();
}
?>


