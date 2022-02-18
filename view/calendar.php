<?php
$this->layout('_templateSystem', ['title' => 'Calendar']);
?>
<?php $this->start('css') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.css">
<?php $this->end('css') ?>

<div id='calendar'></div>



<?php $this->start('js') ?>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.2/main.min.js"></script>
<?php $this->end('js') ?>
<script>
    $(document).ready(function () {
        $('#calendar__active, #calendar__active span').removeClass('text-dark-secondary');
        $('#calendar__active, #calendar__active span').addClass('text-primary');
    });




    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
</script>
