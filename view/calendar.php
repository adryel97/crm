<?php
$this->layout('_templateSystem', ['title' => 'Calendar']);
?>
<?php $this->start('css') ?>
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css"/>
<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css"/>
<?php $this->end('css') ?>

<div class="container mt-5" >
  <div class="mb-3 d-flex align-items-center">
    <button class="btn filter-shadow btn-primary text-white" id="btnToday">Hoje</button>
    <div class="btn-group filter-shadow ms-3">
      <button class="btn  btn-light" id="prevBtn"><i class="ri-arrow-left-line"></i></button>
      <button class="btn  btn-light" id="nextBtn"><i class="ri-arrow-right-line"></i></button>
    </div>
      <span id="date__cal" class="ms-3 fw-bold text-capitalize fs-3"></span>
  </div>
  <div id='calendar'></div>
</div>



<?php $this->start('js') ?>
<script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"></script> 
<script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script> 
<script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/pt-br.min.js"></script>
<script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>
<script src="<?=url()?>/js/calendar.js?v=<?=time()?>"></script>
<script>
      $(document).ready(function () {
        $('#calendar__active, #calendar__active span').removeClass('text-dark-secondary');
        $('#calendar__active, #calendar__active span').addClass('text-primary');
    });
</script>
<?php $this->end('js') ?>

