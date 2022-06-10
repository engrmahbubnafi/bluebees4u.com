
$(function () {
    "use strict";

    //DATATABLE
    // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    $('.data-table').DataTable({
        responsive: true,
        paging: true,
        processing: true,
        serverSide: false,
        searchDelay: 500,
        order: [],
        lengthMenu: [10, 25, 50, 100, 150, 200, 500],
        pageLength: 25,
        columnDefs: [{
            targets: 'no-sort',
            orderable: false,
            order: []
        },
        {
            targets: 'text-center',
            className: "dt-center"
        },
        {
            targets: 'no-search',
            searchable: false
        },
        {
            targets: 'hidden',
            visible: false
        }],
    });
});


