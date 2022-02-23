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