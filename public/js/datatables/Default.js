$(function () {
    $('#example1').DataTable({
        'paging'      : true,
        'fixedHeader' : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true,
        'responsive'  : true,
        'dom': '<l<B>f<t>ip>',
        'buttons': [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'A4',
                title: ' - '
            }

        ]
    })
})