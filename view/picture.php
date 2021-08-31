<?php $this->layout('_templateSystem');?>

<div class="mt-5">
    <div class="d-flex">
        <button class="btn btn-primary text-white fw-bold pt-2 pb-2 me-2">Adicionar novo status</button>
        <div class="dropdown">
            <button class="btn btn-dark-primary fw-bold pt-2 pb-2" type="button" id="dropdownPicture" data-bs-toggle="dropdown" aria-expanded="false">
                Quadros <i class="ri-arrow-down-s-line"></i>
            </button>
            <ul style="--animate-duration: 0.2s;" class="dropdown-menu dropdown-menu-dark  border-0 shadow-none animate__animated animate__zoomIn animate__pulse" aria-labelledby="dropdownPicture">
                <li>
                    <a class="dropdown-item d-flex justify-content-between align-items-center" 
                    data-bs-toggle="modal" data-bs-target="#addPicture" href="#">
                    Novo quadro <i class="ri-artboard-line"></i>
                    </a>
                </li>
                <li><a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Editar quadro <i class="ri-edit-box-line"></i></a></li>
                <div class="dropdown dropend">
                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#" id="dropdownMyPicture" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Meus Quadros <i class="ri-arrow-right-s-fill"></i></a>
                    <div class="dropdown-menu dropdown-menu-dark  border-0 shadow-none animate__animated animate__zoomIn animate__pulse" aria-labelledby="dropdownMyPicture">
                        <a class="dropdown-item" href="#">Quadro 1</a>
                        <a class="dropdown-item" href="#">Quadro 2</a>
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addPicture" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark-primary border-0 rounded">
      <div class="modal-header border-1 border-dark-secondary">
        <h5 class="modal-title text-white">Criar novo quadro</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="mb-4">
                <label class="form-label text-white fw-bold">Nome do quadro</label>
                <input type="text" name="picture" class="form-control bg-dark-secondary border-0 p-3 text-white" placeholder="Novo quadro">
            </div>
      </div>
      <div class="modal-footer border-1 border-dark-secondary">
        <button type="button" class="btn pt-2 pb-2 text-white btn-primary">Salvar</button>
        <button type="button" class="btn pt-2 pb-2 btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>