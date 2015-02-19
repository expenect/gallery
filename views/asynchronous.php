<div class="wrapper">
    <div id="download">
        <h3>Додати нову картинку</h3>
        <hr/>
        <iframe style="display: none;" src="../ajax/add_photo.php" id="superframe" name="superframe" onload="frame_load()"></iframe>
        <form method="post" enctype="multipart/form-data" onSubmit="" target="superframe" action="../ajax/add_photo.php">
            <table>
                <tr><td colspan="2" style="color:red;" id="error"></td></tr>
                <tr><td colspan="2">Опис:</td></tr>
                <tr><td colspan="2"><textarea name="description" id="description" maxlength="200" style="max-width: 890px;"></textarea></td></tr>
                <tr style="float: left;"><td>Виберіть фото:</td><td><input id="file_form" type="file" name="img"  onchange="checkPhoto(this)"/></td></tr>
                <tr><td colspan="2"><input type="submit" value="Відправити" onclick="return add_photo();"/></td></tr>
            </table>
        </form>
        <hr/>
    </div>
    <div id="sort">
        <h4>Сортування</h4>
        <strong onclick='show_content("date");'>По даті</strong>
        <strong onclick='show_content("size");'>По розміру</strong>
        <strong onclick='show_content();'>За замовчуванням</strong>
    </div>
    <div id="load" style="display:none;margin-left: 230px;">
        <img src="../template/img/gamno_style.gif" alt=""/>
    </div>
    <table id="cont_tab">
    </table>
</div>
<script>
    $(document).ready ( function(){

    });
</script>