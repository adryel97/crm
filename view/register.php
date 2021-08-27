<?php $this->layout('_templateIndex');?>

<div class="vw-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="rounded border-top position-relative border-bottom border-primary border-2 bg-dark-primary" style="width: 500px">
            <form action="" class="p-4">
                    <a href="<?=url()?>" class="text-decoration-none"><i class="ri-arrow-left-line text-primary"></i></a> <h4 class="fw-bold text-primary mb-4"> Cadastro</h4>
                    <div>
                        <div class="mb-4">
                            <label class="form-label text-white fw-bold">Nome</label>
                            <input type="text" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Seu nome">
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-white fw-bold">E-mail</label>
                            <input type="email" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="exemplo@email.com">
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-white fw-bold">Data de nascimento</label>
                            <input type="date" class="form-control bg-dark-secondary border-0 p-3 text-white">
                        </div>
                        <div class="mb-4">
                            <div class="row g-3">
                                <div class="col">
                                <label class="form-label text-white fw-bold">Senha</label>
                                    <input type="password" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Sua senha">
                                </div>
                                <div class="col">
                                <label class="form-label text-white fw-bold">Confirmar Senha</label>
                                    <input type="password" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Confirmar senha">
                                </div>
                            </div>
                        </div> 
                        <div class="mb-4">
                            <div class="form-check text-white">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Eu concordo com os termos de privacidade
                                </label>
                            </div>
                        </div>
                        <button class="fw-bold btn btn-primary pt-2 pb-2 ps-3 pe-3 mt-2 text-white">Confirmar</button>
                        <a href="<?=url()?>" class="text-gray btn btn-dark-secondary pt-2 pb-2 ps-3 pe-3 mt-2">Cancelar</a>
                    </div>
            </form>
        </div>
</div>
