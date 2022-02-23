<?php
$this->layout('_templateSystem');
?>
<h3 class="mt-5 fw-bold mb-3">Cadastrar novo veículo</h3>

<div class="rounded bg-white filter-shadow">
    <div class="row rows-cols-3">
        <div class="col">
            <div class="p-4 rounded">
                <h5 class="text-primary fw-bold">Etapa 1</h5>
                <p class="text-muted">Cadastre as informações do veículo corretamente.</p>
                <div class="row row-cols-2">
                    <div class="mb-3 col">
                        <select class="form-select p-3" name="brand" id="brand">
                            <option value="">Marcas</option>
                            <option value="">Audi</option>
                            <option value="">Ford</option>
                            <option value="">Chevrolet</option>
                        </select>
                    </div>
                    <div class="mb-3 col">
                        <select class="form-select p-3" name="model" id="model">
                            <option value="">Modelos</option>
                            <option value="">Fiesta</option>
                            <option value="">Audi A1</option>
                            <option value="">Agile</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <select class="form-select p-3" name="version" id="version">
                        <option value="">Versão</option>
                        <option value="">Fiesta XL 1.0</option>
                        <option value="">Fiesta GLA 1.6</option>
                        <option value="">Fiesta XL 2.0</option>
                    </select>
                </div>
                <div class="mb-3 row row-cols-2">
                    <div class="col">
                        <input type="text" class="form-control p-3" name="placa" id="placa" placeholder="Placa do veículo">
                    </div>
                    <div class=" cols">
                        <input type="text" class="form-control p-3" name="color" id="color" placeholder="Cor do veículo">
                    </div>
                </div>
                <div class="row row-cols-2">
                    <div class="mb-3 col">
                        <select class="form-select p-3" name="port" id="port">
                            <option value="">Portas</option>
                            <option value="">2</option>
                            <option value="">3</option>
                            <option value="">4</option>
                            <option value="">5</option>
                            <option value="">6</option>
                        </select>
                    </div>
                    <div class="mb-3 col">
                        <select class="form-select p-3" name="year" id="year">
                            <option value="">Ano</option>
                            <option value="">2018</option>
                            <option value="">2019</option>
                            <option value="">2020</option>
                            <option value="">2021</option>
                            <option value="">2022</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col ">
            <div class="p-4">
            <h5 class="text-primary fw-bold">Etapa 2</h5>
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
                
            </div>
        </div>
        <div class="col">
            <div class="p-4">
                <div style="width: 100%; height: 280px; " class="border rounded border-3"></div>
                <div class="mt-3">
                    <button type="button" class="btn btn-primary p-3 w-100">Selecionar fotos</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->start('js');?>
<script src="<?=url()?>/js/store.js"></script>
<script>
    $(document).ready(function () {
        $('#store__active, #store__active span').removeClass('text-dark-secondary');
        $('#store__active, #store__active span').addClass('text-primary');
    });
</script>
<?php $this->end('js');?>