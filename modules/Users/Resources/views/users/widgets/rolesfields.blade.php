@push('widget-scripts')
<script src="{{ asset('modules/users/js/fields/select_roles.js') }}"></script>
@endpush

{!! Form::select($name, $roles, $value, ['class' => $class, 'multiple' => 'multiple']) !!}
