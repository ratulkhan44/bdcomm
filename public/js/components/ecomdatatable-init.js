$(function () {
    'use strict';
    //datatable
    $('#listProduct').DataTable({
        dom: 'Bfrtip',
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
    $('#listCustomer').DataTable({
        dom: 'Bfrtip',
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });
});
