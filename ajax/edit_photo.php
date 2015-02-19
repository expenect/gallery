<?php
require_once("../models/manage.php");
require_once("../config.php");
if ($_POST["description_edit"]!="") {
	$manage = new manage();
	$manage->edit_photo($_POST);
}


