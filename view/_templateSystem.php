<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=url()?>/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?=url()?>/css/bootstrap-config.css">
    <link rel="stylesheet" href="<?=url()?>/css/style.css">
    <link rel="stylesheet" href="<?=url()?>/node_modules/css.gg/icons/all.css">
    <link rel="stylesheet" href="<?=url()?>/node_modules/remixicon/fonts/remixicon.css">
    <link rel="stylesheet" href="<?=url()?>/node_modules/animate.css/animate.min.css">
    <script src="<?=url()?>/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?=url()?>/node_modules/@popperjs/core/dist/umd/popper.js"></script>
    <script src="<?=url()?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=url()?>/node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
    <script src="<?=url()?>/node_modules/jquery-validation/dist/jquery.validate.min.js"></script>
</head>
    <body>
        <div class="bg-dark-secondary content__main">
            <div class="container-fluid container__content">
                <nav class="bg-dark-primary nav__navgation rounded">
                    <ul class="p-0 text-center mt-5">
                        <li class="list-style-none border-bottom border-1 border-dark-secondary pb-3 pt-3">
                            <a href="<?=$router->route('system.dashboard')?>" class="text-white text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                    <i class="ri-dashboard-2-line fa-lg"></i>
                                    <span class="form-text text-white">Dashboard</span>
                            </a>
                        </li>   
                        <li class="list-style-none border-bottom border-1 border-dark-secondary pb-3 pt-3">
                            <a href="" class="task text-white text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                    <i class="gg-display-spacing" style="height: 16px; width: 16px;"></i>
                                    <span class="form-text text-white">Tarefas</span>
                            </a>
                        </li>   
                        <li class="list-style-none border-bottom border-1 border-dark-secondary pb-3 pt-3">
                            <a href="#" class="text-white text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                <i class="ri-group-line fa-lg"></i>
                                <span class="form-text text-white">Leads</span>
                            </a>
                        </li>
                        <li class="list-style-none border-bottom border-1 border-dark-secondary pb-3 pt-3">
                            <a href="#" class="text-white text-decoration-none d-flex justify-content-center align-items-center flex-column">
                            <i class="ri-line-chart-line fa-lg"></i>
                                <span class="form-text text-white">Analytics</span>
                            </a>
                        </li>
                        <li class="list-style-none border-bottom border-1 border-dark-secondary pb-3 pt-3">
                            <a href="#" class="text-white text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                <i class="ri-shopping-cart-2-line fa-lg"></i>
                                <span class="form-text text-white">Vendas</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <header class="bg-dark-primary rounded head__header d-flex align-items-center justify-content-end">
                    <button id="logout" router="<?=$router->route('logout.user')?>" 
                    class="btn btn-link text-white text-decoration-none shadow-none border-0 float-end d-flex align-items-center">
                        <i class="ri-logout-box-line me-2"></i>
                        Sair
                    </button>
                </header>

                <section>
                    <?= $this->section('content');?>
                </section>
            </div>
        </div>
        <script src="<?=url()?>/js/config-bootstrap.js"></script>
        <script src="<?=url()?>/js/login.js"></script>
        <script src="<?=url()?>/js/control-views.js"></script>
        <?= $this->section("js");?>
    </body>
</html>
