@extends('adminlte::layouts.default')

@push('widget-scripts')
<script src="{{ asset('assets/js/core.settings.js') }}"></script>
<script src="{{ asset('themes/adminlte/bower/jquery-throttle-debounce/jquery.ba-throttle-debounce.min.js') }}"></script>
<script>
    (function ($, W, D) {
        function set_my_setting(key, $input) {
            $.cms.settings.set(
                    key,
                    $input.val(),
                    function () { // success
                        $input.removeClass('ui-autocomplete-loading')
                                .closest('.form-group')
                                .removeClass('has-warning')
                                .removeClass('has-error')
                                .addClass('has-success');
                    },
                    function () { // error
                        $input.removeClass('ui-autocomplete-loading')
                                .closest('.form-group')
                                .removeClass('has-success')
                                .removeClass('has-warning')
                                .addClass('has-error');
                    },
                    function () { // complete
                    },
                    function () { // beforeSend
                        $input.addClass('ui-autocomplete-loading')
                                .closest('.form-group')
                                .removeClass('has-success')
                                .removeClass('has-error')
                                .addClass('has-warning');
                    });
        }

        $('input[name="APP_SITE_NAME"]').on('keyup', $.debounce(500, function () {
            set_my_setting('APP_SITE_NAME', $(this));
        }));

        $('input[name="APP_SITE_DESCRIPTION"]').on('keyup', $.debounce(500, function () {
            set_my_setting('APP_SITE_DESCRIPTION', $(this));
        }));

        $('input[name="APP_CONTACT_MAIL"]').on('keyup', $.debounce(500, function () {
            set_my_setting('APP_CONTACT_MAIL', $(this));
        }));

        $('input[name="APP_CONTACT_DISPLAY_NAME"]').on('keyup', $.debounce(500, function () {
            set_my_setting('APP_CONTACT_DISPLAY_NAME', $(this));
        }));

    })(jQuery, window, document);
</script>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                {!! $settings['menu'] !!}
                <div class="tab-content">
                    <div class="tab-content">
                        @foreach ($settings['modules'] as $slug => $modules)
                            <div class="tab-pane" id="control-sidebar-{{ $slug }}-tab">
                                @foreach ($modules['widgets'] as $widget)
                                    {!! Widget::get($widget) !!}
                                @endforeach
                                <div class="clear"></div>
                            </div>
                        @endforeach
                        <div class="tab-pane active" id="control-sidebar-settings-tab">

                            <div class="form-group form-group-default has-success">
                                <label>{{ trans('settings.APP_SITE_NAME') }}</label>
                                <input type="text" class="form-control" name="APP_SITE_NAME" required="required"
                                       value="{{ $settings['list']['APP_SITE_NAME'] }}">
                            </div>


                            <div class="form-group form-group-default has-success">
                                <label>{{ trans('settings.APP_SITE_DESCRIPTION') }}</label>
                                <input type="text" class="form-control" name="APP_SITE_DESCRIPTION" required="required"
                                       value="{{ $settings['list']['APP_SITE_DESCRIPTION'] }}">
                            </div>

                            <div class="form-group form-group-default has-success">
                                <label>{{ trans('settings.APP_CONTACT_MAIL') }}</label>
                                <input type="text" class="form-control" name="APP_CONTACT_MAIL" required="required"
                                       value="{{ $settings['list']['APP_CONTACT_MAIL'] }}">
                            </div>

                            <div class="form-group form-group-default has-success">
                                <label>{{ trans('settings.APP_CONTACT_DISPLAY_NAME') }}</label>
                                <input type="text" class="form-control" name="APP_CONTACT_DISPLAY_NAME" required="required"
                                       value="{{ $settings['list']['APP_CONTACT_DISPLAY_NAME'] }}">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
