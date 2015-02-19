<div class="wrapper">
    <div id="download">
        <h3>Додати нову картинку</h3>
        <hr/>
        <form enctype="multipart/form-data" method="post" action="../post/add.php">
            <table>
                <tr><td colspan="2" style="color:red;"><?echo $_SESSION['message'];unset($_SESSION['message']);?></td></tr>
                <tr><td colspan="2">Опис:</td></tr>
                <tr><td colspan="2"><textarea name="description" maxlength="200" style="max-width: 890px;"><?echo $_SESSION['description'];unset($_SESSION['description']);?></textarea></td></tr>
                <tr style="float: left;"><td>Виберіть фото:</td><td><input type="file" name="img"/></td></tr>
                <tr><td colspan="2"><input type="submit" value="Відправити"/></td></tr>
            </table>
        </form>
        <hr/>
    </div>
    <div id="sort">
        <h4>Сортування</h4>
        <a href="?sort=date">По даті</a>
        <a href="?sort=size">По розміру</a>
        <a href="/">За замовчуванням</a>
    </div>
    <table id="cont_tab">
        <tbody>
            <tr>
        <?$j=0; for ($i=0; $i<count($this->photo); $i++){
            if ($j==3){$j=0;?>
        <tr>
            <?} $j++;?>
            <td>
                <a href="?link=delete&id=<?=$this->photo[$i]['id']?>"><img src="../template/img/delete.png" id="img_delete"/></a>
                <a href="?link=edit&id=<?=$this->photo[$i]['id']?>">
                    <div class="img_resize">
                        <img src="../<?=$this->dir_img.$this->photo[$i]["url"];?>" alt=""/>
                    </div><?=$this->photo[$i]["description"];?>
                </a>
                <p><?=date("d.m.Y",strtotime($this->photo[$i]["date"]));?></p>
            </td>
            <?if ($j==3){?>
        </tr>
            <?}?>
        <?}?>
        </tbody>
    </table>
</div>