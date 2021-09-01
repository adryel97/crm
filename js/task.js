/**
 * PLUGIN
 */
 function pluginSortable() {
    $( ".content__list" ).sortable({
        connectWith: "ul",
    })
 }

 /**
 * LOADS
 */
  function loadTask(){
    $.ajax({
      cache: false,
      type: "GET",
      url: $('[router-task]').attr('router-task'),
      dataType: "json",
      success: function (data) {
        taskHtml(data);
      }
    });
}

 /**
 * METODO CREATE
 */
 function createTask() {  
  $('#formCreateTask').submit(function (e) { 
    e.preventDefault();
    $.ajax({
      cache: false,
      type: "POST",
      url: $(this).attr('action'),
      data: $(this).serialize(),
      dataType: "json",
      complete: function (){
        loadTask();
      }
    });
  });
}
 /**
  * HTML
  */
function taskHtml(data){
    $('.content__list').empty();
    $(data).each(function(index, value) { 
      $("#ul__"+value.fk_status).append(`
        <li class="mt-3 list-group-item bg-dark-secondary shadow-0 text-white rounded"
        id="${value.id_task}  data-id="${value.id_task}">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <p class="fw-bold m-0" for="title">
                ${value.name_task}
                </p>
                <i class="ri-edit-2-line"></i>
            </div>
            <p class="m-0 text-truncate w-100" style="font-size: 14px">
            ${value.account_task}
            </p>
            <span><i class="ri-eye-line"></i></span>
        </li>
      `);
    })
  }