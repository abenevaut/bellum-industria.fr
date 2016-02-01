// Initialize a condensed table which will truncate the content
// if they exceed the cell width
var initCondensedTable = function() {
    var table = $('#stripedTable');

    var settings = {
        "sDom": "t",
        "destroy": true,
        "paging": false,
        "scrollCollapse": true
    };

    table.dataTable(settings);
};

initCondensedTable();