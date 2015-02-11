<?
header("Content-Type:text/html;charset='utf8'");

require_once("config.php");


if ($_GET['link'])
{
    $class = trim (strip_tags ($_GET['link']));
}
else
{
    $class = "index";
}
$path_file="controllers/".$class."_controller.php";
if (file_exists($path_file))
{
    include($path_file);
    if(class_exists($class))
    {
        $obj = new $class;
    }
    else
    {
        exit("Нет данные для входа");

    }
}
else
{
    exit ("Файл не знайденно!");
}