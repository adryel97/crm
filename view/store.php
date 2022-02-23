<?php
$this->layout('_templateSystem');
$this->start('css');
?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.4/datatables.min.css"/>
<?php
$this->end('css');
?>
<h3 class="mt-5 fw-bold mb-3">Estoque</h3>
<div>
    <div>
        <button onclick="window.location.href='<?=$router->route('system.createCar') ?>'" class="btn btn-primary text-white d-flex align-items-center pt-2 pb-2"><span class="fw-bold">Adicionar veículo</span> <i class="ri-roadster-fill fa-lg ms-3"></i></button>
    </div>
</div>

<div class="mt-5">
    <table id="table" class="table bg-white">
      <thead>
        <tr>
            <th data-field="foto">Foto</th>
            <th data-field="marca">Marca Modelo</th>
            <th data-field="versao">Versao</th>
            <th data-field="ano">Ano</th>
            <th data-field="placa">Placa</th>
            <th data-field="chassi">Chassi</th>
            <th data-field="status">Status</th>
            <th data-field="acoes">Ações</th>
        </tr>
      </thead>
      <tbody>
          <?php for ($i=0; $i < 60; $i++) { ?>  
        <tr class="rounded border-light2 border-bottom border-top border-0 border-5">
        <td>
            <img src="<?=url()?>/img/img-cars/fiesta.jpg" class="rounded" width="100px">
        </td>
          <td>Ford Fiesta</td>
          <td>Fiesta Hatch S 1.5 16v</td>
          <td>2016</td>
          <td>NEC-5796</td>
          <td>27216313440</td>
          <td>
            <span class="badge rounded-pill bg-success">disponível</span>
          </td>
          <td>
            <button type="button" class="btn btn-primary text-white">Editar <i class="ri-pencil-line"></i></button>
            <button type="button" class="btn btn-danger text-white">Excluir <i class="ri-delete-bin-6-line"></i></button>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>

</div>
<?php $this->start('js');?>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.4/datatables.min.js"></script>
<script src="<?=url()?>/js/store.js"></script>
<script>
    $(document).ready(function () {
        viewTableCars();
        $('#store__active, #store__active span').removeClass('text-dark-secondary');
        $('#store__active, #store__active span').addClass('text-primary');
    });
</script>
<?php $this->end('js');?>