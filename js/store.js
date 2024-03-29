function viewTableCars()
{
    var tables = $('#table').DataTable({
      "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese.json"
        },
        "bFilter": true,
        "filter": true,
        "ordering": false,
        "displayStart": 20,
        "lengthChange": false,
        "dom": '<"d-flex mb-4" f><"nowrap table-responsive" t><"d-flex justify-content-between" ip>'
    })
}

var changesLoad = () => {
    $('#category').change(function () { 
        var categoria = $(this).val();
        $('#brand').empty().html(`<option value="">Marcas</option>`);
        $('#model').empty().html(`<option value="">Modelos</option>`);
        $('#year').empty().html(`<option value="">Ano</option>`);

        $('#brand-fipe').html('---')
        $('#model-fipe').html('---')
        $('#year-modelo').html('---')
        $('#month-actual').html('---')
        $('#value-fipe').html('R$---')
        marcas(categoria);
    });
}

function marcas(categoria)
{
    var url = `https://parallelum.com.br/fipe/api/v1/${categoria}/marcas`;
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (data) {
           $.each(data, function (index, value) { 
                $('#brand').append(`
                    <option value="${value.codigo}">${value.nome}</option>
                `);
           });

           $('#brand').change(function () { 
               var marca = $(this).val()
               var categoria = $('#category').val();
                modelos(categoria, marca)
           });
        }
    });
}

function modelos(categoria, marca)
{
    var url = `https://parallelum.com.br/fipe/api/v1/${categoria}/marcas/${marca}/modelos`
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (data) {
           $('#model').empty();
           $('#model').html(`
           <option value="">Modelos</option>
           `)
           $.each(data.modelos, function (index, value) { 
                $('#model').append(`
                    <option value="${value.codigo}">${value.nome}</option>
                `);
           });

           $('#model').change(function () { 
            var categoria =  $('#category').val();
            var marca =  $('#brand').val();
            var modelo =  $(this).val();
            ano(categoria, marca, modelo);
           });
        }
    });
}

function ano(categoria, marca, modelo)
{
    var url = `https://parallelum.com.br/fipe/api/v1/${categoria}/marcas/${marca}/modelos/${modelo}/anos`
    $.ajax({
        type: "GET",
        url: url,
        dataType: "json",
        success: function (data) {
            $('#year').empty();
            $('#year').html('<option value="">Ano</option>');
           $.each(data, function (index, value) { 
               var ano = () => {
                   if(value.nome == '32000 Diesel' || value.nome == '32000 Gasolina') {
                        var ano = 'Zero Km';
                        return ano;
                   } else {
                        var ano = value.nome
                        var ano = ano.split(' ');
                        return ano[0];
                   }
               }
               $('#year').append(`
                    <option value="${value.codigo}">${ano()}</option>
                `);
           });

           $('#year').change(function () { 
            var categoria =  $('#category').val();
            var marca =  $('#brand').val();
            var modelo =  $('#model').val();
            var ano =  $(this).val();
            fipe(categoria, marca, modelo, ano);
           });
        }
    });
}

function fipe(categoria, marca, modelo, ano)
{
    var url = `https://parallelum.com.br/fipe/api/v1/${categoria}/marcas/${marca}/modelos/${modelo}/anos/${ano}`;

    if(ano != ''){
        $.ajax({
            type: "GET",
            url: url,
            dataType: "json",
            success: function (data) {
                var marca = data.Marca;
                var modelo = data.Modelo;
                var anoModelo = () => {
                    if(data.AnoModelo == '32000') {
                         var ano = 'Zero Km';
                         return ano;
                    } else {
                         var ano = data.AnoModelo
                         return ano;
                    }
                }
                var mesRef = data.MesReferencia;
                var valorFipe = data.Valor;
    
                $('#brand-fipe').html(marca)
                $('#model-fipe').html(modelo)
                $('#year-modelo').html(anoModelo())
                $('#month-actual').html(mesRef)
                $('#value-fipe').html(valorFipe)
            }
        });
    } else {
        $('#brand-fipe').html('---')
        $('#model-fipe').html('---')
        $('#year-modelo').html('---')
        $('#month-actual').html('---')
        $('#value-fipe').html('R$---')
    }
}

function preview() 
{
    $('#files').change(function (e) { 
        e.preventDefault();

        if(this.files) {
            var files = this.files.length;
            for (let i = 0; i < files; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML(`
                    <li class="p-3 col grid__foto ">
                        <div class="rounded border-2 border-primary border overflow-hidden filter-shadow bg-white">
                            <img class="w-100" style="object-fit: cover; height: 180px;" src="${event.target.result}">
                            <div class="p-2 d-flex bg-white">
                                <a href="#" onclick="removerImg(this)" class="text-decoration-none text-red"><i class="ri-delete-bin-6-line fa-lg"></i></a>
                                <a href="#" class="text-decoration-none text-dark ms-2"><i class="ri-drag-move-2-line fa-lg"></i></a>
                            </div>
                        </div>
                    </li> 
                    `)).appendTo('#preview');
                }
                reader.readAsDataURL(this.files[i]);
            }
        }
    });
}

function removerImg(remove)
{
    $(remove).closest('li').remove();
}


function serializeData()
{
    var category = $("#category").val();
    var brand = $("#brand").val();
}


function saveCar()
{
    $('#btn--save__car').click(function (e) { 
        e.preventDefault();
        var imagens = $('#preview img');
        var dataImages = []
        var extensao = ['png', 'jpg', 'jpeg']

        const category = $('#category').val();
        const brand = $('#brand :selected').text();
        const brandCod = $('#brand').val();
        const model = $('#model :selected').text();
        const modelCod = $('#model').val();
        const year = $('#year :selected').text();
        const plate = $('#plate').val();
        const color = $('#color').val();
        const colorHexa = $('#color-hexa').val();
        const port = $('#port').val();
        const km = $('#km').val();
        const valueCar = $('#val-car').val();
        const valuePromotion = $('#val-promotion').val();
        const valueTransference = $('#val-transference').val();
        const noteCar = $('#note-car').val();
        const yearCod = $('#year').val();

        const formData = {
            "category":category,
            "brand":brand,
            "brandCod":brandCod,
            "model":model,
            "modelCod":modelCod,
            "year":year,
            "plate": plate,
            "color":color,
            "colorHexa":colorHexa,
            "port":port,
            "km":km,
            "valueCar":valueCar,
            "valuePromotion":valuePromotion,
            "valueTransference":valueTransference,
            "noteCar":noteCar,
            "yearCod":yearCod
        }


        for (let i = 0; i < imagens.length; i++) {
            var img = imagens[i].src;
            var extension = img.split(';')[0].split('/')[1];
            dataImages.push({
                "imagem": img,
                "extensao": extension
            })
        }
        
        for (let i = 0; i < dataImages.length; i++) {
            var verificar = dataImages[i].extensao;
            var response = false;
            if(extensao.includes(verificar))
            {
                response = true;
            } else {
                response = false;
            }
        }

        if (imagens.length > 0 && response == true) {                    
            $.ajax({
                type: "POST",
                url: "http://www.crm.local/system/store/sendCar",
                data: {dataImages, formData},
                dataType: "json"
            });
        } else if(imagens.length <= 0){
            alert('Error: Ops nenhuma imagem foi selecionada');
        }
        else {
            alert('Error: Imagem não compatível');
        }
    });
}