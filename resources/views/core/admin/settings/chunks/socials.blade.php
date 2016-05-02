<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
            <span class="username">
                Facebook
            </span>
        </div>
    </div>
    <div class="box-body">

        <div class="form-group form-group-default">
            <label>{{ trans('services.facebook.client_id') }}</label>
            <input type="text" class="form-control" name="services.facebook.client_id"
                   value="{{ old('services.facebook.client_id', $settings->get('services.facebook.client_id')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('services.facebook.client_secret') }}</label>
            <input type="text" class="form-control" name="services.facebook.client_secret"
                   value="{{ old('services.facebook.client_secret', $settings->get('services.facebook.client_secret')) }}">
        </div>

    </div>
</div>


<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
            <span class="username">
                Twitter
            </span>
        </div>
    </div>
    <div class="box-body">

        <div class="form-group form-group-default">
            <label>{{ trans('services.twitter.client_id') }}</label>
            <input type="text" class="form-control" name="services.twitter.client_id"
                   value="{{ old('services.twitter.client_id', $settings->get('services.twitter.client_id')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('services.twitter.client_secret') }}</label>
            <input type="text" class="form-control" name="services.twitter.client_secret"
                   value="{{ old('services.twitter.client_secret', $settings->get('services.twitter.client_secret')) }}">
        </div>

    </div>
</div>


<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
            <span class="username">
                Linkedin
            </span>
        </div>
    </div>
    <div class="box-body">

        <div class="form-group form-group-default">
            <label>{{ trans('services.linkedin.client_id') }}</label>
            <input type="text" class="form-control" name="services.linkedin.client_id"
                   value="{{ old('services.linkedin.client_id', $settings->get('services.linkedin.client_id')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('services.linkedin.client_secret') }}</label>
            <input type="text" class="form-control" name="services.linkedin.client_secret"
                   value="{{ old('services.linkedin.client_secret', $settings->get('services.linkedin.client_secret')) }}">
        </div>

    </div>
</div>


<div class="box box-primary box-widget collapsed-box">
    <div class="box-header with-border">
        <div class="user-block">
            <button type="button" class="btn btn-box-tool"
                    data-widget="collapse"><i class="fa fa-plus"></i>
            </button>
            <span class="username">
                Github
            </span>
        </div>
    </div>
    <div class="box-body">

        <div class="form-group form-group-default">
            <label>{{ trans('services.github.client_id') }}</label>
            <input type="text" class="form-control" name="services.github.client_id"
                   value="{{ old('services.github.client_id', $settings->get('services.github.client_id')) }}">
        </div>

        <div class="form-group form-group-default">
            <label>{{ trans('services.github.client_secret') }}</label>
            <input type="text" class="form-control" name="services.github.client_secret"
                   value="{{ old('services.github.client_secret', $settings->get('services.github.client_secret')) }}">
        </div>

    </div>
</div>