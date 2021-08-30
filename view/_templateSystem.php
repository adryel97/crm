<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/css/bootstrap-config.css">
    <link rel="stylesheet" href="<?=url()?>/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/node_modules/css.gg/icons/all.css">
    <link rel="stylesheet" href="<?=url()?>/node_modules/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="<?=url()?>/node_modules/animate.css/animate.min.css">
    <script src="<?=url()?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?=url()?>/node_modules/@popperjs/core/dist/umd/popper.js"></script>
    <script src="<?=url()?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=url()?>/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
</head>
<body>
    <div class="vw-100 vh-100 bg-dark-secondary content__main">
        <div class="container-fluid container__content">
            <nav class="bg-dark-primary nav__navgation rounded"></nav>
            
            <header class="bg-dark-primary rounded head__header">

            </header>
            <section>
                <?= $this->section('content');?>
            </section>
        </div>
    </div>
</body>
</html>
