$(function () {
    'use strict';
    $(document).ready(function () {
        setDataTable();
    });
    //datatable
    function setDataTable() {
        $(document).ready(function () {
            var table = $('#myTable').DataTable();
            var table = $('#ajaxTable').DataTable({
                "ajax": 'assets/js/ajax/arrays.txt'
            });
            var table = $('#example').DataTable({
                dom: 'Bfrtip',
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            })
            var table = $('#listProduct').DataTable({
                dom: 'Bfrtip',
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            var table = $('#yearlypay').DataTable({
                dom: 'Bfrtip',
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    }
});
