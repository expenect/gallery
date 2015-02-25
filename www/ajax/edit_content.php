<?php
require_once("../models/model.php");
$error = false;

$model = new Model("photo");
$config = new config();

$data = $model->getID($_POST["id"]);
$dir_img = $config->dir_template.$config->dir_img;



$content ='<div id="edit">
        <h3>Редагування</h3>
		<iframe style="display: none;" src="../ajax/edit_photo.php" id="frame_edit" name="frame_edit" onload="frame_ed();">
		</iframe>
        <form enctype="multipart/form-data" method="post" action="../ajax/edit_photo.php" target="frame_edit">
            <table>
                <tr><td colspan="2" ><strong style="color:red; font-weight: normal;" id="edit_error"></strong></td></tr>
                <tr><td colspan="2">Опис:</td></tr>
                <tr><td colspan="2"><textarea name="description_edit" id="description_edit" maxlength="200" style="max-width: 890px;">'.$data[0]["description"].'</textarea></td></tr>
<tr style="float: left;"><td>Виберіть фото(щоб залишити старе фото не обирайте):</td><td><input type="file" id="img_edit" name="img_edit" onchange="checkPhoto_edit(this)"/>
				</td></tr><tr><td colspan="2">
				<input type="hidden" value="'.$data[0]["id"].'" name="id"/>
				<input type="hidden" value="'.$data[0]["url"].'" name="url_photo"/>
				<input type="hidden" value="'.$data[0]["size"].'" name="size"/>
			</td></tr>
		<tr style="float:left;"><td><input type="submit" value="Зберегти" onclick="return edit_check();"/></td><td><input type="button" value="Повернутись назад" onclick="show_content()"/></td></tr>
		</table>
		</form>
		</div>';



if($error){
	echo json_encode(array('result' => 'error', 'msg' => $error));
}
else echo json_encode(array('result' => 'content','content'=> $content));



