<?php
require_once("../models/model.php");
$error = false;

$model = new Model("photo");
$sort = $_POST['sort'];
$photo = $model->getALL($sort);


$config = new config();

$dir_img = $config->dir_template.$config->dir_img;



$content = "<div id=\"sort\">
					<h4>Сортування</h4>
					<strong onclick='show_content(\"date\");'>По даті</strong>
					<strong onclick='show_content(\"size\");'>По розміру</strong>
					<strong onclick='show_content();'>За замовчуванням</strong>
				</div>
           <table id=\"cont_tab\"><tbody>
        <tr>";
$j=0;
	for ($i=0; $i<count($photo); $i++){
	if ($j==3){
		$j=0;
		$content.="<tr>";
	}
		$j++;
		$content.="<td>";
		$content.='<a onclick="delete_photo('.$photo[$i]["id"].')"><img src="../template/img/delete.png" id="img_delete"/></a>
				<a onclick="edit_photo('.$photo[$i]["id"].')">
			<div class="img_resize">
				<img src="../'.$dir_img.$photo[$i]["url"].'" alt=""/>
			</div>'.$photo[$i]["description"].'</a>
		<p>'.date("d.m.Y",strtotime($photo[$i]["date"])).'</p>
	</td>';
	if ($j==3){
		$content.="</tr>";
	}
}
$content.="</tbody></tabel>";


if($error){
	// если есть ошибки то отправляем ошибку и ее текст
	echo json_encode(array('result' => 'error', 'msg' => $error));
}
else echo json_encode(array('result' => 'content','content'=> $content));
?>


