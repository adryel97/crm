<?php
$this->layout('_templateSystem');
$this->start('css');
?>
<style>
    .sortable { 
        width: 100%;
        height: 500px;
        display: flex;
        list-style: none;
    }
    .sortable li {
        padding: 1px;
        height: auto;
        text-align: center;
    }
    .grid__foto {
        
    }
</style>
<?php $this->end('css'); ?>
<section class="pb-5">
    <h3 class="mt-5 fw-bold mb-3">Cadastrar novo veículo</h3>
    <div class="rounded bg-white filter-shadow">
        <div class="row row-cols-2">
            <div class="col">
                <div class="p-4 rounded">
                    <h5 class="text-primary fw-bold">Informações do veículo</h5>
                    <p class="text-muted">Cadastre as informações do veículo corretamente.</p>
                    <div class="mb-3">
                            <select class="form-select p-3" name="category" id="category">
                                <option value="">Categoria</option>
                                <option value="carros">Carro</option>
                                <option value="motos">Moto</option>
                                <option value="caminhoes">Caminhão</option>
                            </select>
                    </div>
                    <div class="row row-cols-2">
                        <div class="mb-3 col">
                            <select class="form-select p-3" name="brand" id="brand">
                                <option value="">Marcas</option>
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <select class="form-select p-3" name="model" id="model">
                                <option value="">Modelos</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-select p-3" name="year" id="year">
                            <option value="">Ano</option>
                        </select>
                    </div>
                    <div class="mb-3 row row-cols-3">
                        <div class="col">
                            <input type="text" class="form-control p-3" name="placa" id="placa" placeholder="Placa do veículo">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control p-3" name="color" id="color" placeholder="Cor do veículo">
                        </div>
                        <div class="col">
                            <select class="form-select p-3" name="port" id="port">
                                <option value="">Portas</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">6</option>
                            </select>
                        </div>
                    </div>
                    <h5 class="text-primary mt-5 fw-bold">Informação de valores</h5>
                    <p class="text-muted">Cadastre as condições do seu veículo. Quilometragem e valores.</p>
                    <div class="mb-3">
                            <input type="text" class="form-control p-3" name="km" id="km" placeholder="Quilometragem">
                    </div>
                    <div class="mb-3">
                            <input type="text" class="form-control p-3" placeholder="Valor do veículo">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="value-car">R$</span>
                        <input type="text" class="form-control p-3" placeholder="Valor do veículo" aria-describedby="value-car">
                    </div>
                    
                    <div class="mb-3 row row-cols-2">
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text" id="value-car">R$</span>
                                <input type="text" class="form-control p-3" placeholder="Valor de oferta" aria-describedby="value-car" aria-describedby="valor-oferta">
                            </div>
                            <div id="valor-oferta" class="form-text mt-0">Campos não é obrigatório.</div>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text" id="value-car">R$</span>
                                <input type="text" class="form-control p-3" placeholder="Valor de repasse" aria-describedby="value-car" aria-describedby="valor-repasse">
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 mb-3">
                        <h5 class="text-primary fw-bold">Observação do veículo</h5>
                        <p class="text-muted">Insira uma observação ou informações complementares.</p>
                        <textarea rows="5" class="w-100 form-control" placeholder="Deixe sua observação aqui"></textarea>
                    </div>
                    <div>
                        <button class="btn btn-success ps-4 pe-4 pt-3 pb-3 text-white fw-bold">Salvar veículo</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="p-4">
                    <h5 class="text-primary fw-bold">Fotos do veículo</h5>
                    <p class="text-muted">Insira fotos para melhorar sua venda.</p>

                    <ul style="width: 100%; height: 500px;" id='preview' class="m-0 p-3 row row-cols-3 sortable border rounded border-3 border-dashed overflow-auto">
                        <li class="p-3 col grid__foto ">
                            <div class="rounded border-2 border-primary border overflow-hidden filter-shadow">
                                <img class="w-100" style="object-fit: cover; height: 180px;" src="<?=url()?>/img/img-cars/civic.jpg">
                                <div class="p-2 d-flex bg-white">
                                    <a href="#" class="text-decoration-none text-red"><i class="ri-delete-bin-6-line fa-lg"></i></a>
                                    <a href="#" class="text-decoration-none text-dark ms-2"><i class="ri-drag-move-2-line fa-lg"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="p-3 col grid__foto ">
                            <div class="rounded border-2 border-primary border overflow-hidden filter-shadow">
                                <img class="w-100" style="object-fit: cover; height: 180px;" src="<?=url()?>/img/img-cars/civic.jpg">
                                <div class="p-2 d-flex bg-white">
                                    <a href="#" class="text-decoration-none text-red"><i class="ri-delete-bin-6-line fa-lg"></i></a>
                                    <a href="#" class="text-decoration-none text-dark ms-2"><i class="ri-drag-move-2-line fa-lg"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="p-3 col grid__foto ">
                            <div class="rounded border-2 border-primary border overflow-hidden filter-shadow">
                                <img class="w-100" style="object-fit: cover; height: 180px;" src="<?=url()?>/img/img-cars/civic.jpg">
                                <div class="p-2 d-flex bg-white">
                                    <a href="#" class="text-decoration-none text-red"><i class="ri-delete-bin-6-line fa-lg"></i></a>
                                    <a href="#" class="text-decoration-none text-dark ms-2"><i class="ri-drag-move-2-line fa-lg"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="mt-3">
                        <label type="button" class="btn btn-primary-lg text-primary p-3 w-100">
                            <span class="fw-bold">Selecionar fotos</span> <i class="bi bi-camera fa-lg ms-2"></i>
                            <input type="file" id='files' name="files[]" multiple hidden>
                        </label>
                    </div>


                    <div class="mt-5">
                        <h5 class="fw-bold text-primary">Valor FIPE</h5>
                        <div class="row row-cols-2 mt-4">
                            <div class="col mb-3">
                                <div class=" border border-1 border-primary p-3 filter-shadow rounded">
                                    <p class="fw-bold mb-3">Marca</p>
                                    <p id="brand-fipe">---</p>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class=" border border-1 border-primary p-3 filter-shadow rounded">
                                    <p class="fw-bold mb-3">Modelo</p>
                                    <p id="model-fipe">---</p>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="border border-1 border-primary p-3 filter-shadow rounded">
                                    <p class="fw-bold mb-3">Ano Modelo</p>
                                    <p id="year-modelo">---</p>
                                </div>
                            </div>
                            <div class="col mb-3">
                                <div class="border border-1 border-primary p-3 filter-shadow rounded">
                                    <p class="fw-bold mb-3">Referente ao mês</p>
                                    <p id="month-actual">---</p>
                                </div>
                            </div>
                            <div class="w-100">
                                <div class="border border-2 bg-primary-lg border-primary p-5 rounded">
                                    <p class="fw-bold mb-3">Valor da FIPE</p>
                                    <h3 class="text-primary fw-bold" id="value-fipe">R$---</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->start('js');?>
<script>
    $(document).ready(function () {
        changesLoad();
        $('#store__active, #store__active span').removeClass('text-dark-secondary');
        $('#store__active, #store__active span').addClass('text-primary');
    });

    $(function() {
    $(".sortable" ).sortable();
});
</script>
<script src="<?=url()?>/js/store.js?v=<?=time()?>"></script>
<?php $this->end('js');?>