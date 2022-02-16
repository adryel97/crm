<?php $this->layout('_templateSystem');?>

<div class="mt-5">
    <div class="d-flex">
        <a class="d-flex align-items-center btn btn-primary text-white fw-bold pt-2 pb-2 me-2"  data-bs-toggle="modal" data-bs-target="#addPicture" href="#">
            Crie seu primeiro quadro <i class="ms-3 ri-artboard-line"></i>
        </a>
    </div>
<div>
<!-- Modal PICTURE-->
<div class="modal fade" id="addPicture" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form id="formCreatePicture" action="<?=$router->route('kanban.pictureCreate')?>" class="modal-content bg-dark-primary border-0 rounded">
      <div class="modal-header border-1 border-dark-secondary">
        <h5 class="modal-title text-white">Criar novo quadro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
                <input type="text" class="d-none" name="fkUser" value="<?=$idUser?>">
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