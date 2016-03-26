$(function () {
    "use strict";

    $.ajaxPrefilter(function(options, originalOptions, xhr) { // this will run before each request
        var token = $('meta[name="csrf-token"]').attr('content'); // or _token, whichever you are using

        if (token) {
            return xhr.setRequestHeader('X-CSRF-TOKEN', token); // adds directly to the XmlHttpRequest Object
        }
    });

    function connectedSortableNoDataMessage() {
        $.each($('.connectedSortable'), function (k, elem) {
            elem = $(elem);
            if (elem.children().length == 0) {
                elem.html(
                    '<div class="alert alert-info alert-dismissible no-data">'
                    + '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'
                    + '<h4><i class="icon fa fa-info"></i> No element in this column</h4>'
                    + '</div>'
                );
            }
            else {
                elem.find('.no-data').remove();
            }
        });
    }

    $(".connectedSortable").sortable({
        placeholder: "sort-highlight",
        connectWith: ".connectedSortable",
        handle: ".box-header",
        forcePlaceholderSize: true,
        zIndex: 999999,
        receive: function (event, ui) {

            //var $thisSortable = $(this);
            var $targetList = $(event.target);
            var $tagetElement = $(ui.item.context);

            // Fix the drag&drop cursor position
            if (!$tagetElement.hasClass('box')) {
                $tagetElement = $tagetElement.closest('.box');
            }

            var widgetID = $tagetElement.attr('data-id');

            if ($targetList.hasClass('js-active-list')) {

                $tagetElement
                    .find('.overlay')
                    .removeClass('hidden');

                setTimeout(function () {
                    $.ajax({
                        type: "POST",
                        url: cvepdb_config.url_site + '/admin/dashboard/update',
                        data: {
                            "_method": "PUT",
                            "id": widgetID,
                            "status": "active"
                        },
                        success: function (code_html, statut) {
                            $tagetElement
                                .addClass('box-success')
                                .removeClass('box-default')
                                .find('.overlay')
                                .addClass('hidden');
                        },
                        error: function (resultat, statut, erreur) {
                            cvepdb.error(resultat);
                            //var errors = $.parseJSON(resultat.responseText);
                            //cvepdb.error(errors);
                        },
                        complete: function (jqXHR, status) {
                            connectedSortableNoDataMessage();
                        }//,
                        //statusCode: {
                        //    422: function () {
                        //        //$thisSortable.sortable('cancel');
                        //    }
                        //}
                    });
                }, 300);
            }
            else if ($targetList.hasClass('js-inactive-list')) {

                $tagetElement
                    .find('.overlay')
                    .removeClass('hidden');

                setTimeout(function () {
                    $.ajax({
                        type: "POST",
                        url: cvepdb_config.url_site + '/admin/dashboard/update',
                        data: {
                            "_method": "PUT",
                            "id": widgetID,
                            "status": "inactive"
                        },
                        success: function (code_html, statut) {
                            $tagetElement
                                .addClass('box-default')
                                .removeClass('box-success')
                                .find('.overlay')
                                .addClass('hidden');
                        },
                        error: function (resultat, statut, erreur) {
                            cvepdb.error(resultat);
                            //var errors = $.parseJSON(resultat.responseText);
                            //cvepdb.error(errors);
                        },
                        complete: function (jqXHR, status) {
                            connectedSortableNoDataMessage();
                        }//,
                        //statusCode: {
                        //    422: function () {
                        //        //$thisSortable.sortable('cancel');
                        //    }
                        //}
                    });
                }, 300);
            }
        }
    });
    $(".connectedSortable .box-header").css("cursor", "move");
    connectedSortableNoDataMessage();
});
