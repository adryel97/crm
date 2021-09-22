var root = window.location.protocol + '//' +window.location.hostname;
/**
 * LOADS
 */
 function loadStatus(){
    $.ajax({
      cache: false,
      type: "GET",
      url: $('[router-status]').attr('router-status'),
      dataType: "json",
      success: function (data) {
        statusHtml(data);
        pluginSortable();
        loadTask();
      }
    });
}

function createStatus()
{
    $('#formCreateStatus').submit(function (e) { 
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: "json",
            beforeSend: function (){
                $('.btn__save--status')
                .html(`Salvando <i class="ms-2 gg-spinner"></i>`)
                .addClass('disabled');
            },
            complete: function (){
                    loadStatus();
                    $('.btn__save--status')
                    .html('Salvar')
                    .removeClass('disabled');
            }
        });
    });
}

/**
 * MONTAGE HTML
 */
 function statusHtml(data){
    $('.painelStatus').empty();
    $(data).each(function(index, value) { 
      $('.painelStatus').append(`
      <div class="float-left gx-5 mt-3  pb-1" data-id-status="${value.id_status}">
            <div class="m-2 ms-0 rounded bg-dark-primary border-top border-3 border-${value.color_status}" style="width: 300px;" id="sortable${value.id_status}">
                <div style="width: 300px" class="p-3 pe-1">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="text-white fw-bold m-0">
                        ${value.name_status}
                        </h5>
                        <div class="d-flex align-items-center">
                            <a onclick="alterarValue(${value.id_status})" href="#" class="text-white text-decoration-none" data-bs-toggle="modal" data-bs-target="#addTask">
                                <i class="ri-add-line"></i>
                            </a>
                            <div class="btn btn-default shadow-none dropdown dropend">
                                <a id="dropdownMyOptionStatus" class="text-decoration-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-2-fill text-white"></i>
                                </a>
                                <div style="--animate-duration: 0.2s;" class="dropdown-menu dropdown-menu-dark shadow border-0 animate__animated animate__zoomIn animate__pulse" aria-labelledby="dropdownMyOptionStatus">
                                    <a class="dropdown-item d-flex justify-content-between align-items-center" href="#">Editar status <i class="ri-edit-2-line text-yellow"></i></a>
                                    <a onclick="verification(${value.id_status})" class="dropdown-item d-flex justify-content-between align-items-center" href="#">
                                        Excluir status <i class="ri-delete-bin-line text-red"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul style="max-height: 52.6vh; overflow-y: auto;" class="content__list d-flex flex-column scroll__dark pe-2 m-0 p-0 pt-3 pb-3" id="ul__${value.id_status}" data-code="${value.id_status}">
                        
                    </ul>
                    <div class="text-center mt-3">
                        <button class="btn btn-default shadow-none" onclick="alterarValue(${value.id_status})" data-bs-toggle="modal" data-bs-target="#addTask">
                            <h6 class="text-muted fw-bold m-0">Adicionar cartão +</h6>
                        </button>
                    </div>
                </div>
            </div>
        </div>
      `);
    });
  }

/**
 * EVENTO MODAL
 */
function alterarValue(fk)
{
  $('[name="fkStatus"]').val(fk);
}

function verification(idStatus)
{
    $.ajax({
        type: "POST",
        url: root + "/system/kanban/status/delete/check",
        data: {"idStatus" : idStatus},
        dataType: "json",
        cache: false,
        success: function (data) {
            verificationDelete(data, idStatus);
        }
    });
}

function verificationDelete(data, idStatus)
{
    if(data == true){
        var modalDelete = new bootstrap.Modal(document.getElementById('deleteStatus'), {
            keyboard: false
          })
          modalDelete.show()
        $('[name="idStatus"]').val(idStatus);
        $('.btn__delete').click(function (e) { 
            e.preventDefault();
            deleteStatus(idStatus);
        });

    } else{
        var modalDeleteAviso = new bootstrap.Modal(document.getElementById('verificationDeleteStatus'), {
            keyboard: false
          })
          modalDeleteAviso.show()
    }
}

function deleteStatus(idStatus)
{
    $.ajax({
        type: "POST",
        url: root + "/system/kanban/status/delete",
        data: {"idStatus": idStatus},
        dataType: "json",
        success: function (data) {
            console.log(data);
        },
        complete: function (){
            $(`[data-id-status="${idStatus}"]`).hide();
        }
    });
}