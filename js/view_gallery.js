function add_photo(){

    flag=false;
    var description =document.getElementById("description").value;
    if (description==""){
        document.getElementById("error").innerHTML="Поле з описом пусте";
        document.getElementById("description").focus();
    }
    else if(document.getElementById("file_form").value==""){
        document.getElementById("error").innerHTML="Виберіть фотографію";
    }
    else {
        document.getElementById("error").innerHTML="";
        flag=true;
    }

    if (flag) {
        return true;
    }
    return false;
}

function checkPhoto(target) {
    var filesExt = ['jpg', 'jpeg', 'png'];
    var parts = target.value.toLowerCase().split('.') ;
    if (!(filesExt.join().search(parts[parts.length - 1]) != -1)) {
        document.getElementById("error").innerHTML = "Формат фотографії не вірний. Можливі формати jpeg,jpg,png";
        document.getElementById("file_form").value="";
        return false;
    }
    if(target.files[0].size/1024/1024 > 1) {
        document.getElementById("error").innerHTML = "Зображення перевищує ліміт в 1 мб.";
        document.getElementById("file_form").value="";
        return false;
    }
    return true;
}

function frame_load(){
    $("#load").hide();
    show_content();
    if (document.getElementById("description").value!="" && document.getElementById("file_form").value!=""){
        document.getElementById("error").innerHTML = "Фото добавлено.";
    }
    document.getElementById("description").value="";
    document.getElementById("file_form").value="";
}


function show_content(sort_img){
    document.getElementById("cont_tab").innerHTML="";
    $("#load").show();
    $.ajax({
        url: '/ajax/content.php',
        type: "POST",
        dataType : "json",
        data:{
            'sort':sort_img
        },
        success: function(data){
            if (data.result == 'content'){
                document.getElementById("cont_tab").innerHTML=data.content;
                $("#load").hide();
            }
        }
    });

}