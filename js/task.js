/**
 * PLUGIN
 */
 function pluginSortable() {
    $( ".content__list" ).sortable({
        connectWith: "ul",
        receive: function (e, ui){ 
          var codeId = ui.item[0].attributes["data-id"].value;
          var codeFk = ui.item[0].parentElement.attributes["data-code"].value;
          var itemOrder = $(this).sortable("toArray");
          $.ajax({
              type: "POST",
              url: $('[router-active]').attr('router-active'),
              data: {"idTask": codeId, "fkStatus": codeFk},
              dataType: "json",
              success: function (data) {
                console.log(data);
              }
            });
        },
        update: function(event, ui) { 
          var positionOrder = $(this).sortable('toArray');
          for (var i = 0; i < positionOrder.length; i++) {
            var position = Object.keys(positionOrder);
            var identificador = positionOrder;
            $('#'+identificador[i]).css({'order' : position[i]});
            $.ajax({
              type: "POST",
              url: $('[router-position]').attr('router-position'),
              data: {"position": position[i], "idTask": identificador[i]},
              dataType: "json"
            });
          }
        }
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
        $('#accountTask, #nameTask').val('');
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
        id="${value.id_task}"  data-id="${value.id_task}" style="order: ${value.order_task}">
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