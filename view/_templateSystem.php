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
                        <li class="list-style-none border-1 border-white  pb-3 pt-3 dropdown dropend">
                            <a href="" id="task__active" class="task text-dark-secondary  text-decoration-none d-flex justify-content-center align-items-center flex-column"
                            id="task__drop" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="gg-display-spacing" style="height: 16px; width: 16px;"></i>
                                    <span class="task_icon form-text text-dark-secondary">CRM</span>
                            </a>
                            <ul class="dropdown-menu list_pictures--menu"  aria-labelledby="task__drop">
                                <li><a class="dropdown-item d-flex justify-content-between align-items-center" data-bs-toggle="modal" data-bs-target="#addPicture" href="#">Criar quadro <i class="ri-artboard-line"></i></a></li>
                                <li class="diver"></li>
                            </ul>
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
        <!-- Modal PICTURE-->
        <div class="modal fade" id="addPicture" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <form id="formCreatePicture" action="<?=$router->route('kanban.pictureCreate')?>" class="modal-content bg-white border-0 rounded">
            <div class="modal-header border-1 border-0">
                <h5 class="modal-title">Criar novo quadro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                        <input type="text" name="fkUser" value="<?=$user->id_user?>">
                    <div class="mb-4">
                        <label class="form-label fw-bold">Nome do quadro</label>
                        <input type="text" name="picture" class="form-control p-3 text-white" placeholder="Novo quadro">
                    </div>
            </div>
            <div class="modal-footer border-0 d-flex">
                <button type="submit" class="btn pt-2 pb-2 text-white btn-primary btn__save--picture d-flex">Salvar</button>
                <button type="button" class="btn pt-2 pb-2 btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
            </form>
        </div>
        </div>
        <script src="<?=url()?>/js/config-bootstrap.js?v=<?=time()?>"></script>
        <script src="<?=url()?>/js/login.js?v=<?=time()?>"></script>
        <script src="<?=url()?>/js/control-views.js?v=<?=time()?>"></script>
        <?= $this->section("js");?>
        <script src="<?=url()?>/lib/slugify/slugify.js?v=<?=time()?>"></script>
    </body>
</html>
