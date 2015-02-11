<?

$ar = array ("1",2,"ar"=>array(2,3,4,"ar"=>array(123,42,"ar"=>"welcome")));

var_dump($ar);

echo $ar["ar"]["ar"]["ar"];
?>