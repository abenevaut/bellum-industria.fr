var initBasicTable = function () {

    var table = $('#basicTable');

    var settings = {


        "sDom": "<'table-responsive't><'row'<p i>><'exportOptions'T><'table-responsive't><'row'<p i>>",
        "destroy": true,
        "scrollCollapse": true,
        "scrollX": false,
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
        "iDisplayLength": 5,
        "oTableTools": {
            "sSwfPath": "assets/plugins/jquery-datatable/extensions/TableTools/swf/copy_csv_xls_pdf.swf",
            "aButtons": [{
                "sExtends": "csv",
                "sButtonText": "<i class='pg-grid'></i>",
            }, {
                "sExtends": "xls",
                "sButtonText": "<i class='fa fa-file-excel-o'></i>",
            }, {
                "sExtends": "pdf",
                "sButtonText": "<i class='fa fa-file-pdf-o'></i>",
            }, {
                "sExtends": "copy",
                "sButtonText": "<i class='fa fa-copy'></i>",
            }]
        },
        fnDrawCallback: function(oSettings) {
            $('.export-options-container').append($('.exportOptions'));

            $('#ToolTables_tableWithExportOptions_0').tooltip({
                title: 'Export as CSV',
                container: 'body'
            });

            $('#ToolTables_tableWithExportOptions_1').tooltip({
                title: 'Export as Excel',
                container: 'body'
            });

            $('#ToolTables_tableWithExportOptions_2').tooltip({
                title: 'Export as PDF',
                container: 'body'
            });

            $('#ToolTables_tableWithExportOptions_3').tooltip({
                title: 'Copy data',
                container: 'body'
            });
        },

        "paging": true,
        "aoColumnDefs": [
            {
                'bSortable': false,
                'aTargets': [0]
            }
        ],
        "order": [
            [1, "asc"]
        ]

    };

    table.dataTable(settings);

    // search box for table
    $('#search-table').keyup(function() {
        table.fnFilter($(this).val());
    });

    $('#basicTable input[type=checkbox]').click(function () {
        if ($(this).is(':checked')) {
            $(this).closest('tr').addClass('selected');
        } else {
            $(this).closest('tr').removeClass('selected');
        }
    });

};

initBasicTable();


