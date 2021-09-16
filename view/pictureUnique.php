<?php $this->layout('_templateSystem');
?>
<div class="mt-5">
    <div class="d-flex">
        <button class="btn btn-primary text-white fw-bold pt-2 pb-2 me-2" data-bs-toggle="modal" data-bs-target="#addStatus">Adicionar novo status</button>
        <div class="dropdown">
            <button class="btn btn-dark-primary fw-bold pt-2 pb-2" type="button" id="dropdownPicture" data-bs-toggle="dropdown" aria-expanded="false">
                Quadros <i class="ri-arrow-down-s-line"></i>
            </button>
            <ul style="--animate-duration: 0.2s;" class="shadow dropdown-menu dropdown-menu-dark  border-0 animate__animated animate__zoomIn animate__pulse" aria-labelledby="dropdownPicture">
                <li>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" 
                    data-bs-toggle="modal" data-bs-target="#addPicture" href="#">
                    Novo quadro <i class="ri-artboard-line"></i>
                    </a>
                </li>
                <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Editar quadro <i class="ri-edit-box-line"></i></a></li>
                <div class="dropdown dropend">
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" id="dropdownMyPicture" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Meus Quadros <i class="ri-arrow-right-s-fill"></i></a>
                    <div style="--animate-duration: 0.2s;" class="dropdown-menu dropdown-menu-dark  shadow border-0 animate__animated animate__zoomIn animate__pulse" aria-labelledby="dropdownMyPicture">
                        <a class="dropdown-item" href="#">Quadro 1</a>
                        <a class="dropdown-item" href="#">Quadro 2</a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <div class="overflow-auto painelStatus d-flex" 
    router-task="<?=url('system')?>/kanban/task/<?= $idPicture ?>" 
    router-status="<?=url('system')?>/kanban/status/<?= $idPicture ?>"
    router-active="<?=$router->route('kanban.alterActive')?>"
    router-position="<?=$router->route('kanban.alterList')?>"
    >
    
    </div> 
</div>

<!-- Modal PICTURE-->
<div class="modal fade" id="addPicture" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form id="formCreatePicture" action="<?=$router->route('kanban.pictureCreate')?>" class="modal-content bg-dark-primary border-0 rounded">
      <div class="modal-header border-1 border-dark-secondary">
        <h5 class="modal-title text-white">Criar novo quadro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <input type="text" class="d-none" name="fkUser" value="<?=$user->id_user?>">
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Nome do quadro</label>
                <input type="text" name="picture" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Novo quadro">
            </div>
      </div>
      <div class="modal-footer border-1 border-dark-secondary d-flex">
        <button type="submit" class="btn pt-2 pb-2 text-white btn-primary btn__save--picture d-flex">Salvar</button>
        <button type="button" class="btn pt-2 pb-2 btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal TASK-->
<div class="modal fade" id="addTask" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form id="formCreateTask" action="<?=$router->route('kanban.taskCreate')?>" class="modal-content bg-dark-primary border-0 rounded">
      <div class="modal-header border-1 border-dark-secondary">
        <h5 class="modal-title text-white">Adicionar nova tarefa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <input type="text" class="d-none" name="fkStatus">
            <input type="text" class="d-none" name="fkPicture" value="<?= $idPicture ?>">
            <input type="text" class="d-none" name="fkUser" value="<?=$user->id_user?>">
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Título da tarefa</label>
                <input type="text" name="nameTask" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Nova tarefa">
            </div>
            <div class="mb-4">
              <label class="form-label text-white fw-bold">Descrição da tarefa</label>
              <textarea name="accountTask" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Faça a descrição da tarefa aqui" id="accountTask" rows="5"></textarea>
            </div>
      </div>
      <div class="modal-footer border-1 border-dark-secondary d-flex">
        <button type="submit" class="btn pt-2 pb-2 text-white btn-primary btn__save--task d-flex">Salvar</button>
        <button type="button" class="btn pt-2 pb-2 btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal STATUS-->
<div class="modal fade" id="addStatus" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form id="formCreateStatus" action="<?=$router->route('kanban.statusCreate')?>" class="modal-content bg-dark-primary border-0 rounded">
      <div class="modal-header border-1 border-dark-secondary">
        <h5 class="modal-title text-white">Adicionar novo status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <input type="text" class="d-none" name="fkPicture" value="<?=$idPicture?>">
            <input type="text" class="d-none" name="fkUser" value="<?=$user->id_user?>">
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Título</label>
                <input type="text" name="status" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Título do status">
            </div>
            <div class="mb-4">
              <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                <input value="primary" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio1" autocomplete="off" checked>
                <label class="btn btn-primary p-3 pt-4 label__radio" for="btnradio1"></label>

                <input value="purple" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio2" autocomplete="off">
                <label class="btn btn-purple p-3 pt-4 label__radio" for="btnradio2"></label>

                <input value="pink" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio3" autocomplete="off">
                <label class="btn btn-pink p-3 pt-4 label__radio" for="btnradio3"></label>

                <input value="red" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio4" autocomplete="off">
                <label class="btn btn-red p-3 pt-4 label__radio" for="btnradio4"></label>

                <input value="orange" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio5" autocomplete="off">
                <label class="btn btn-orange p-3 pt-4 label__radio" for="btnradio5"></label>

                <input value="yellow" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio6" autocomplete="off">
                <label class="btn btn-yellow p-3 pt-4 label__radio" for="btnradio6"></label>

                <input value="green" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio7" autocomplete="off">
                <label class="btn btn-green p-3 pt-4 label__radio" for="btnradio7"></label>

                <input value="cyan" type="radio" class="btn-check colors__radio" name="btnradio" id="btnradio8" autocomplete="off">
                <label class="btn btn-cyan p-3 pt-4 label__radio" for="btnradio8"></label>
              </div>
            </div>
      </div>
      <div class="modal-footer border-1 border-dark-secondary d-flex">
        <button type="submit" class="btn pt-2 pb-2 text-white btn-primary btn__save--status d-flex">Salvar</button>
        <button type="button" class="btn pt-2 pb-2 btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </form>
  </div>
</div>

<?php $this->start('js') ?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function () {
        loadStatus();
        createStatus();
        createTask();
        pluginSortable();
    });
  </script>
  <script src="<?=url()?>/js/status.js"></script>
  <script src="<?=url()?>/js/task.js"></script>
  <script src="<?=url()?>/js/picture.js"></script>
<?php $this->end('js') ?>