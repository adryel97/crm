<?php
$this->layout('_templateSystem', ['title' => 'Calendar']);
?>
<?php $this->start('css') ?>

<?php $this->end('css') ?>

<div id='calendar'></div>



<?php $this->start('js') ?>

<?php $this->end('js') ?>
<script>
    $(document).ready(function () {
        $('#calendar__active, #calendar__active span').removeClass('text-dark-secondary');
        $('#calendar__active, #calendar__active span').addClass('text-primary');
    });
</script>
