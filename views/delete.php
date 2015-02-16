<div class="wrapper">
    <div id="edit">
        <h3>Ви дійсно бажаєте видалити цей запис?</h3>
        <hr/>
                <img src="../<?=$this->dir_img.$this->data_del[0]["url"];?>" alt="" style="max-width:400px;"/>
        </a>
        <p><?=date("d.m.Y",strtotime($this->data_del[0]["date"]));?></p>
        <form enctype="multipart/form-data" method="post" action="../post/delete.php">
            <table>
                <tr><td colspan="2" style="color:red;"></td></tr>
                <tr><td colspan="2">Опис:</td></tr>
                <tr><td colspan="2"><textarea name="description_edit" maxlength="200" style="max-width: 890px;"><?=$this->data_del[0]["description"]?></textarea></td></tr>
                <tr><td colspan="2">
                        <input type="hidden" value="<?=$_GET["id"]?>" name="id"/>
                        <input type="hidden" value="<?=$_GET["url"]?>" name="url_photo"/>
                    </td></tr>
                <tr><td><input type="submit" name="yes" value="Так"/></td><td><input type="submit" name="no" value="Ні"/></td></tr>
            </table>
        </form>
        <hr/>
    </div>
</div>