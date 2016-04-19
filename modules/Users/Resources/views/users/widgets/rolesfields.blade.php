@push('widget-scripts')
<script>
    (function($, W, D){
        $(D).bind('CVEPDB_SELECT2_READY', function(){
            $('select[name="{{ $name }}"]').select2({
                theme: "bootstrap",
                width: '100%',
                placeholder: "{{ $placeholder }}",
            });
        });
    })(jQuery, window, document);
</script>
@endpush

{!! Form::select($name, $roles, $value, ['class' => $class, 'multiple' => 'multiple']) !!}
