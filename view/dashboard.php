<?php
$this->layout('_templateSystem');
?>

<script>
    $(document).ready(function () {
        $('#dashboard__active, .dashboard_text').removeClass('text-dark-secondary');
        $('#dashboard__active, .dashboard_text').addClass('text-primary');
    });
</script>