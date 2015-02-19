var iterator_edit=0;

function delete_photo(id){

    if (confirm("Ви дійсно бажаєте видалити запис?")) {
        $.ajax({
            url: '/ajax/delete_photo.php',
            type: "POST",
            dataType: "json",
            data: {
                'id': id
            },
            success: function (data) {
                    document.getElementById("error").innerHTML = data.msg;
                    show_content();
            }
        });
    }
}

function edit_check(){
    flag=false;
    var description =document.getElementById("description_edit").value;
    if (description==""){
        document.getElementById("edit_error").innerHTML="Поле з описом пусте";
        document.getElementById("description_edit").focus();
    }
    else {
        document.getElementById("edit_error").innerHTML="";
        flag=true;
    }

    return flag;
}

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

    return flag;
}

function checkPhoto(target) {
    var filesExt = ['jpg', 'jpeg', 'png'];
    var parts = target.value.toLowerCase().split('.') ;
    if (!(filesExt.join().search(parts[parts.length - 1]) != -1)) {
        document.getElementById("error").innerHTML = "Формат фотографії не вірний. Можливі формати jpeg,jpg,png";
        document.getElementById("file_form").value="";
    }
    if(target.files[0].size/1024/1024 > 1) {
        document.getElementById("error").innerHTML = "Зображення перевищує ліміт в 1 мб.";
        document.getElementById("file_form").value="";
    }
}


function checkPhoto_edit(target) {
    var filesExt = ['jpg', 'jpeg', 'png'];
    var parts = target.value.toLowerCase().split('.') ;
    if (!(filesExt.join().search(parts[parts.length - 1]) != -1)) {
        document.getElementById("edit_error").innerHTML = "Формат фотографії не вірний. Можливі формати jpeg,jpg,png";
        document.getElementById("img_edit").value="";
    }
    if(target.files[0].size/1024/1024 > 1) {
        document.getElementById("edit_error").innerHTML = "Зображення перевищує ліміт в 1 мб.";
        document.getElementById("img_edit").value="";
    }
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

function frame_ed(){
    if (iterator_edit==1) {
        iterator_edit=0;
        show_content();
        document.getElementById("error").innerHTML = "Фото відреадаговано!";
    }
    else {
        iterator_edit=1;
    }
}


function show_content(sort_img){
    document.getElementById("container_cont").innerHTML="";
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
                document.getElementById("container_cont").innerHTML=data.content;
                $("#load").hide();
            }
        }
    });
}

function edit_photo(id){
    document.getElementById("container_cont").innerHTML="";
    $("#load").show();
    $.ajax({
        url: '/ajax/edit_content.php',
        type: "POST",
        dataType : "json",
        data:{
            'id':id
        },
        success: function(data){
            if (data.result == 'content'){
                document.getElementById("container_cont").innerHTML=data.content;
                $("#load").hide();

            }
        }
    });
}