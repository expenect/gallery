<div class="wrapper">
    <table class="cont_tab">
        <tbody>
        <?for ($i=0; $i<count($this->photo); $i++){
            if ($i%3==0 || $i==0){?>
        <tr>
            <?}?>
            <td><a href="#"><div class="img_resize"><img src="../<?=$this->dir_img.$this->photo[$i]["url"];?>" alt=""/></div><?=$this->photo[$i]["description"];?></a>    <p><?=date("d.m.Y",strtotime($this->photo[$i]["date"]));?></p></td>
            <?if (($i%4==0 && $i!=0) || $i+1==count($this->photo)){?>
        </tr>
            <?}?>
        <?}?>
        </tbody>
    </table>
</div>