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
 * Editar Task
 */
function editTask(){
  $('#formEditarTask').submit(function (e) { 
    e.preventDefault();
    var data = $(this).serialize(); //pega o valor para alterar no banco
    var dataEdit = $(this).serializeArray(); //pega o valor em array para editar a tarefa no status
    var router = $(this).attr('action');
    $.ajax({
      type: "POST",
      url: router,
      data: data,
      dataType: "json",
      beforeSend: function () {
          $('.btn__save--taskEdit').html(`
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            <span class="visually">Loading...</span>
          `).attr('disabled')
      },
      success: function (data) {
        console.log(data);
      }, 
      complete: function (){ 
        $(`.title__task-${dataEdit[3].value}`).text(dataEdit[4].value)
        $(`.account__task-${dataEdit[3].value}`).text(dataEdit[5].value)
        $('.btn__save--taskEdit').html(`
            Salvar
        `).removeAttr('disabled')
      }
    });
  });
}

/**
 * Pegar informações da tarefa para editar
 */
 function getDataTask(btn){
    var codeStatus = $(btn).attr('data-fk-status'); //Codigo do status
    var codeTask = $(btn).attr('data-id-task'); //Codigo da tarefa
    var codePicture = $(btn).attr('data-fk-picture'); //Codigo do quadro
    var codeUser = $(btn).attr('data-fk-user'); //Codigo do user
    var codeUserReceived = $(btn).attr('data-fk-user-received'); //Codigo do user que criou a tarefa

    var routerGetStauts = $('#formEditarTask').attr('data-get-task'); //Rota para pegar a tarefa

    /**
     * Altera os valores do status
     */
    $('#fkStatusEdit').val(codeStatus);
    $('#idTask').val(codeTask);


    $.ajax({
      type: "POST",
      url: routerGetStauts,
      data: {codeUser: codeUser, codeTask: codeTask, codePicture: codePicture},
      dataType: "json",
      success: function (data) {
        $('#nameTaskEdit').val(data.name_task);
        $('#accountTaskEdit').val(data.account_task);
      }
    });
 }

 /**
  * HTML
  */
function taskHtml(data){
    $('.content__list').empty();
    $(data).each(function(index, value) { 
      var target = '#delete__'+value.id_task;
      deleteTaskVerification(value.fk_user_received, target, value.id_task, value.name_task);
      var strg = '';
      var verificationUserEdit = () => {
        if(value.fk_user_received != value.fk_user && value.fk_user_received != null){
            strg = '';
            return strg;
        } else {
          strg = `
          <i onclick="getDataTask(this)" 
                data-id-task="${value.id_task}" 
                data-fk-status="${value.fk_status}"
                data-fk-picture="${value.fk_picture}"
                data-fk-user="${value.fk_user}"
                data-fk-user-received="${value.fk_user_received}"
                data-bs-toggle="modal" 
                data-bs-target="#editTask" 
                class="ri-edit-2-line cursor__pointer edit_task"></i>
          `;
          return strg;
        }
      }
      
      $("#ul__"+value.fk_status).append(`
        <li class="mt-3 list-group-item bg-white filter-shadow rounded tasks__list border-3"
        id="${value.id_task}"  data-id="${value.id_task}" style="order: ${value.order_task};">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <p class="fw-bold m-0 title__task-${value.id_task}" for="title">
                ${value.name_task}
                </p>
                ${verificationUserEdit()}
            </div>
            <p class="m-0 text-truncate w-100 account__task-${value.id_task}" style="font-size: 14px">
            ${value.account_task}
            </p>
            <span><i class="ri-eye-line"></i></span>
            <span id="delete__${value.id_task}"></span>
        </li>
      `);
    })
  }

  function deleteTaskVerification(data, target, idTask, nameTask)
  {
    var btnDeletar = `<i onclick="deleteTaskData(this)" 
    data-id="${idTask}" 
    data-name="${nameTask}" 
    data-bs-toggle="modal" 
    data-bs-target="#deletarTask"
    class="ri-delete-bin-line text-red cursor__pointer">`;
    $.ajax({
      type: "POST",
      url: "http://www.crm.local/system/kanban/task/deleteTaskVerification",
      data: {codeUser: data},
      dataType: "json",
      success: function (data) {
        if(data == true){
          $(target).html(btnDeletar);
          $('.name__task--delete').text(nameTask);
        } else {
          $(target).empty();
        }
      }
    });
  }

  function deleteTaskData(btn)
  {
    var idKey = $(btn).attr('data-id');
    $('#task__delete').val(idKey);
  }

  function deleteTask()
  {
    $('.btn__delete--task').click(function (e) { 
      e.preventDefault();
      var data = {idTask: $('#task__delete').val()}
      $.ajax({
        type: "POST",
        url: $(this).attr('data-router'),
        data: data,
        dataType: "json",
        complete: function (){
          $('#'+ $('#task__delete').val()).hide();
          bootstrap.Modal.getOrCreateInstance(document.getElementById('deletarTask')).hide()
        }
      });
    });
  } 