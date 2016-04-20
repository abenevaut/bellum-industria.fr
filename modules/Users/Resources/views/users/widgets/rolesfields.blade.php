@push('widget-scripts')
{{--<script src="{{ asset('modules/users/js/fields/select_roles.js') }}"></script>--}}
<script>
    (function($, W, D){
        $(D).bind('CVEPDB_SELECT2_READY', function(){
            var select_role = $('select[name="{{ $name }}"]');
            select_role.select2({
                theme: "bootstrap",
                width: '100%',
                placeholder: "{{ $placeholder }}"
            });
            $('.js-cancel-filters').on('click', function() {
                select_role.select2("val", "");
            });
        });
    })(jQuery, window, document);
</script>
@endpush


{!! Form::select($name, $roles, $value, ['class' => $class, 'multiple' => 'multiple']) !!}
