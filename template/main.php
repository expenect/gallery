<html>
<head>
	<title><?=$this->title;?></title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <meta name="keywords" content="" />
	<meta name="description" content="" />
	<link href="<?=$this->css?>" rel="stylesheet">
</head>
<body>
    <div class="wrapper">

    <?php include_once ("views/".$this->content.".php"); ?>

      </div>
</body>
</html>