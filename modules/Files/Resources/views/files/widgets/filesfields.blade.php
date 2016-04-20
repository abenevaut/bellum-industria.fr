@push('widget-scripts')
<script>
    //Edit SL: more universal
    $(document).on('hidden.bs.modal', function (e) {
        $(e.target).removeData('bs.modal');
    });
</script>
@endpush


<div class="input-group">
    <div class="input-group-btn">
        <button data-toggle="modal" href="{{ url('admin/files/popup/input_file_' . $name) }}"
           data-target="#file_{{ $name }}" class="btn btn-primary">
            Choose file
        </button>
    </div>
    <input type="text" id="input_file_{{ $name }}" name="{{ $name }}" value="{{ $value }}" class="form-control {{ $class }}">
</div>
<div class="modal modal-default" id="file_{{ $name }}">
    <div class="modal-dialog" style="width:90%;">
        <div class="modal-content">
        </div>
    </div>
</div>
