<!-- BEGIN VENDOR JS -->
<script src="/dist/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="/dist/plugins/modernizr.custom.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="/dist/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery/jquery-easy.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-bez/jquery.bez.min.js"></script>
<script src="/dist/plugins/jquery-ios-list/jquery.ioslist.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-actual/jquery.actual.min.js"></script>
<script src="/dist/plugins/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script type="text/javascript" src="/dist/plugins/bootstrap-select2/select2.min.js"></script>
<script type="text/javascript" src="/dist/plugins/classie/classie.js"></script>
<script src="/dist/plugins/switchery/js/switchery.min.js" type="text/javascript"></script>
<script src="/dist/plugins/summernote/js/summernote.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="/dist/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="/dist/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="/dist/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="/dist/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="/dist/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/dist/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="/dist/plugins/jquery-inputmask/jquery.inputmask.min.js"></script>
<script src="/dist/plugins/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript" src="/dist/plugins/jquery-autonumeric/autoNumeric.js"></script>
<script type="text/javascript" src="/dist/plugins/dropzone/dropzone.min.js"></script>
<script type="text/javascript" src="/dist/plugins/bootstrap-tag/bootstrap-tagsinput.min.js"></script>
<!-- END VENDOR JS -->
<script src="/dist/js/pages.min.js"></script>
<script src="/dist/js/pages_scripts/tables.js" type="text/javascript"></script>
<script src="/dist/js/pages_scripts/form_elements.js" type="text/javascript"></script>
<script src="/dist/js/pages_scripts/scripts.js" type="text/javascript"></script>
<script>
    $(function()
    {
        $('#form-login').validate()

        $('#summernote').summernote({
            height: 200,
            onfocus: function(e) {
                $('body').addClass('overlay-disabled');
            },
            onblur: function(e) {
                $('body').removeClass('overlay-disabled');
            }
        });
    });
</script>