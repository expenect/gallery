<div class="wrapper">
    <div id="edit">
        <h3>Редагування</h3>
        <hr/>
        <form enctype="multipart/form-data" method="post" action="../post/edit.php">
            <table>
                <tr><td colspan="2" style="color:red;"></td></tr>
                <tr><td colspan="2">Опис:</td></tr>
                <tr><td colspan="2"><textarea name="description_edit" maxlength="200" style="max-width: 890px;"><?=$this->data_edit[0]["description"]?></textarea></td></tr>
                <tr style="float: left;"><td>Виберіть фото(щоб залишити старе фото не обирайте):</td><td><input type="file" name="img_edit"/></td></tr>
                <tr><td colspan="2">
                        <input type="hidden" value="<?=$_GET["id"]?>" name="id"/>
                        <input type="hidden" value="<?=$this->data_edit[0]["url"]?>" name="url_photo"/>
                        <input type="hidden" value="<?=$this->data_edit[0]["size"]?>" name="size"/>
                    </td></tr>
                <tr><td colspan="2"><input type="submit" value="Зберегти"/></td></tr>
            </table>
        </form>
        <hr/>
    </div>
</div>