<?php $this->layout('_templateIndex');?>

<div class="vw-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="bg-white rounded border-top position-relative border-bottom border-primary border-2" style="width: 500px">
            <form data-action="<?=$router->route('createUser.user')?>" id="createUserForm" class="p-4">
                    <a href="<?=url()?>" class="text-decoration-none"><i class="ri-arrow-left-line text-primary"></i></a> <h4 class="fw-bold text-primary mb-4"> Cadastro</h4>
                    <div>
                        <div class="mb-4">
                            <label class="form-label  fw-bold">Nome</label>
                            <input type="text" name="name" id="name" class="form-control p-3" placeholder="Seu nome">
                        </div>
                        <div class="mb-4">
                            <label class="form-label  fw-bold">E-mail</label>
                            <input type="email" name="email" id="email" class="form-control  p-3" placeholder="exemplo@email.com">
                        </div>
                        <div class="mb-4">
                            <label class="form-label  fw-bold">Data de nascimento</label>
                            <input type="date" name="birthDate" id="birthDate" class="form-control   p-3 ">
                        </div>
                        <div class="mb-4">
                            <div class="row g-3">
                                <div class="col">
                                <label class="form-label fw-bold">Senha</label>
                                    <input type="password" name="password" id="password" class="form-control  p-3" placeholder="Sua senha">
                                </div>
                                <div class="col">
                                <label class="form-label fw-bold">Confirmar Senha</label>
                                    <input type="password" class="form-control  p-3" placeholder="Confirmar senha">
                                </div>
                            </div>
                        </div> 
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="accept" name="accept" value="true">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Eu concordo com os termos de privacidade
                                </label>
                            </div>
                        </div>
                        <button class="fw-bold btn btn-primary pt-2 pb-2 ps-3 pe-3 mt-2 text-white">Confirmar</button>
                        <a href="<?=url()?>" class="text-dark btn btn-dark-secondary pt-2 pb-2 ps-3 pe-3 mt-2">Cancelar</a>
                    </div>
            </form>
        </div>
</div>

<?php $this->start('js')?>
<script src="<?=url()?>/js/user.js"></script>
<?php $this->end('js')?>
