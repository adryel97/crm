<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$title?></title>
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
        <div class="content__main">
            <div class="container-fluid container__content">
                <nav class="bg-white nav__navgation rounded filter-shadow">
                    <ul class="p-0 text-center mt-5">
                        <li class="list-style-none border-1 border-white pb-3 pt-3">
                            <a href="<?=$router->route('system.dashboard')?>" class="text-dark-secondary text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                    <i class="ri-dashboard-2-line fa-lg"></i>
                                    <span class="form-text text-dark-secondary">Dashboard</span>
                            </a>
                        </li>   
                        <li class="list-style-none border-1 border-white  pb-3 pt-3">
                            <a href="" id="task__active" class="task text-dark-secondary text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                    <i class="gg-display-spacing" style="height: 16px; width: 16px;"></i>
                                    <span class="task_icon form-text text-dark-secondary">Tarefas</span>
                            </a>
                        </li>   
                        <li class="list-style-none border-1 border-white  pb-3 pt-3">
                            <a href="#" class="text-dark-secondary text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                <i class="ri-group-line fa-lg"></i>
                                <span class="form-text text-dark-secondary">Leads</span>
                            </a>
                        </li>
                        <li class="list-style-none border-1 border-white  pb-3 pt-3">
                            <a href="#" class="text-dark-secondary text-decoration-none d-flex justify-content-center align-items-center flex-column">
                            <i class="ri-line-chart-line fa-lg"></i>
                                <span class="form-text text-dark-secondary">Analytics</span>
                            </a>
                        </li>
                        <li class="list-style-none border-1 border-white  pb-3 pt-3">
                            <a href="#" class="text-dark-secondary text-decoration-none d-flex justify-content-center align-items-center flex-column">
                                <i class="ri-shopping-cart-2-line fa-lg"></i>
                                <span class="form-text text-dark-secondary">Vendas</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <header class="bg-white rounded head__header d-flex align-items-center filter-shadow">
                    <div class="w-50">
                        <div>
                            <p class="m-0 name__user--title text-dark-secondary"></p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end w-50">
                        <button id="logout" router="<?=$router->route('logout.user')?>" 
                        class="btn btn-link text-decoration-none shadow-none border-0 float-end d-flex align-items-center">
                            <i class="ri-logout-box-line me-2"></i>
                            Sair
                        </button>
                    </div>
                </header>
                <section>
                    <?= $this->section('content');?>
                </section>
            </div>
        </div>
        <script src="<?=url()?>/js/config-bootstrap.js?v=<?=time()?>"></script>
        <script src="<?=url()?>/js/login.js?v=<?=time()?>"></script>
        <script src="<?=url()?>/js/control-views.js?v=<?=time()?>"></script>
        <?= $this->section("js");?>
        <script src="<?=url()?>/lib/slugify/slugify.js?v=<?=time()?>"></script>
    </body>
</html>
