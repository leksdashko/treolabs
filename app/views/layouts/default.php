<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
    
    <?= (new \app\components\menu\Menu('menulist'))->run()?>
    <?= $content ?>
    
    <script src="web/js/script.js"></script>
	
</body>
</html>