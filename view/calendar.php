<?php
$this->layout('_templateSystem', ['title' => 'Calendar']);
?>
<?php $this->start('css') ?><link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.css" />

<!-- If you use the default popups, use this. -->


<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.css" />

<link rel="stylesheet" type="text/css" href="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.css" />
<?php $this->end('css') ?>

<div class="container mt-5">
  <div id='calendar'></div>
</div>



<?php $this->start('js') ?>
<script src="https://uicdn.toast.com/tui.code-snippet/v1.5.2/tui-code-snippet.min.js"></script>

<script src="https://uicdn.toast.com/tui.time-picker/latest/tui-time-picker.min.js"></script>

<script src="https://uicdn.toast.com/tui.date-picker/latest/tui-date-picker.min.js"></script>

<script src="https://uicdn.toast.com/tui-calendar/latest/tui-calendar.js"></script>

<script>
var Calendar = tui.Calendar;
// jquery wrapper
var $calEl = $('#calendar').tuiCalendar({
  defaultView: 'month',
  taskView: true,
  scheduleView: true,
  isReadOnly: true,
  template: {
      milestone: function(schedule) {
        return '<span style="color:red;"><i class="fa fa-flag"></i> ' + schedule.title + '</span>';
      },
      milestoneTitle: function() {
        return 'Milestone';
      },
      task: function(schedule) {
        return '&nbsp;&nbsp;#' + schedule.title;
      },
      taskTitle: function() {
        return '<label><input type="checkbox" />Task</label>';
      },
      allday: function(schedule) {
        return schedule.title + ' <i class="fa fa-refresh"></i>';
      },
      alldayTitle: function() {
        return 'All Day';
      },
      time: function(schedule) {
        return schedule.title + ' <i class="fa fa-refresh"></i>' + schedule.start;
      }
    },
    week: {
      daynames: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
      startDayOfWeek: 0,
      narrowWeekend: true
    },
    month: {
      daynames: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
      startDayOfWeek: 0,
      narrowWeekend: true
    },
    // whether use default creation popup or not
        useCreationPopup: true,
    // whether use default detail popup or not
    useDetailPopup: true
});
// You can get calendar instance
var calendarInstance = $calEl.data('tuiCalendar');
calendarInstance.createSchedules([]);
</script>
<?php $this->end('js') ?>

