<?php
require_once("../models/manage.php");
require_once("../config.php");
$config = new config();
$manage = new manage();

if ($manage->delete_photo($_POST['id'])){
	$result="Видалення виконано успішно!";
}
else {
	$error = "Видалення не здійснено!";
}

if($error){
	echo json_encode(array('result' => 'error', 'msg' => $error));
}
else echo json_encode(array('result' => 'content','msg'=> $result));




