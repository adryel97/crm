<?php $this->layout('_templateIndex')?>

<div class="vw-100 vh-100 d-flex justify-content-center align-items-center">
        <div class="rounded border-top position-relative border-bottom border-primary border-2 bg-white" style="width: 400px">
            <form method="post" action="<?=$router->route('login.user')?>" id="loginUserForm" class="p-4">
                    <h4 class="fw-bold text-primary mb-4">Login</h4>
                    <div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">E-mail</label>
                            <input type="email" name="email" class="form-control  p-3 " placeholder="exemplo@email.com">
                        </div>
                        <div class="mb-4">
                            <label class="form-label fw-bold">Senha</label>
                            <input type="password" name="password" class="form-control p-3 " placeholder="Sua senha">
                        </div>
                        <button class="fw-bold btn btn-primary pt-2 pb-2 ps-3 pe-3 mt-2 text-white">Entrar</button>
                    </div>
            </form>
            <div class="position-absolute" style="bottom: -35px"><a href="<?=url('register')?>" class="text-primary text-decoration-none">Criar nova conta</a></div>
        </div>
</div>