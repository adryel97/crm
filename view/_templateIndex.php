<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap-config.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
</head>
<body>
    <div class="vw-100 vh-100 bg-dark-secondary">
        <?= $this->section('content');?>
        <?= $this->section("js");?>
    </div>
    <script src="node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
</body>
</html>
