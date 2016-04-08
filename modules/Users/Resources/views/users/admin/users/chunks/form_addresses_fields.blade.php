<div class="form-group form-group-default">
    {!! Form::label('organization', 'Organization', array('class'=>'control-label')) !!}
    {!! Form::text('organization', null, array('class'=>'form-control', 'placeholder'=>'Organization')) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('street', 'Street Address', array('class'=>'control-label')) !!}
    {!! Form::text('street', null, array('class'=>'form-control', 'placeholder'=>'Street Address')) !!}
    {!! Form::text('street_extra', null, array('class'=>'form-control', 'placeholder'=>'', 'style'=>'margin-top:6px')) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('city', 'City / Town', array('class'=>'control-label')) !!}
    {!! Form::text('city', null, array('class'=>'form-control', 'placeholder'=>'Town or City Name')) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('state', 'State / Province', array('class'=>'control-label')) !!}
    {!! Addresses::selectState('state', null, array('class'=>'form-control', 'country'=>'US')) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('zip', 'Zip / Postal Code', array('class'=>'control-label')) !!}
    {!! Form::text('zip', null, array('class'=>'form-control', 'placeholder'=>'Postal Code')) !!}
</div>

@if(\Config::get('users.show_country'))
    <div class="form-group form-group-default">
        {!! Form::label('country', 'Country', array('class'=>'control-label')) !!}
        {!! Addresses::selectCountry('country', \Config::get('users.default_country'), array('class'=>'form-control')) !!}
    </div>
@endif

@foreach(\Config::get('users.flags') as $flag)
    <div class="form-group form-group-default">
        <div class="checkbox">
            {!! Form::hidden('is_'.$flag, 0) !!}
            <label>
                {!! Form::checkbox('is_'.$flag) !!}
                Set as {!! ucfirst($flag) !!} Address</label>
        </div>
    </div>
@endforeach
