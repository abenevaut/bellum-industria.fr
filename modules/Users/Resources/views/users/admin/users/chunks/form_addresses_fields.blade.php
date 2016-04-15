{!! Form::hidden('address['.$type.'][is_' . $type . ']', 1) !!}

<div class="form-group form-group-default">
    {!! Form::label('country', 'Country', array('class'=>'control-label')) !!}
    {!! Addresses::selectCountry('address['.$type.'][country]', old('address['.$type.'][country]', (!empty($address) ? $address->country : \Config::get('addresses.default_country'))), array('class'=>'form-control js-call-select2', 'data-type' => $type)) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('state', 'State / Province', array('class'=>'control-label')) !!}
    {!! Addresses::selectState('address['.$type.'][state]', old('address['.$type.'][state]', (!empty($address) ? $address->state : null)), array('class'=>'form-control js-call-select2', 'data-type' => $type, 'country'=>\Config::get('addresses.default_country'))) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('zip', 'Zip / Postal Code', array('class'=>'control-label')) !!}
    {!! Form::text('address['.$type.'][zip]', old('address['.$type.'][zip]', (!empty($address) ? $address->zip : null)), array('class'=>'form-control', 'placeholder'=>'Postal Code')) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('city', 'City / Town', array('class'=>'control-label')) !!}
    {!! Form::text('address['.$type.'][city]', old('address['.$type.'][city]', (!empty($address) ? $address->city : null)), array('class'=>'form-control', 'placeholder'=>'Town or City Name')) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('street', 'Street Address', array('class'=>'control-label')) !!}
    {!! Form::text('address['.$type.'][street]', old('address['.$type.'][street]', (!empty($address) ? $address->street : null)), array('class'=>'form-control', 'placeholder'=>'Street Address')) !!}
    {!! Form::text('address['.$type.'][street_extra]', old('address['.$type.'][street_extra]', (!empty($address) ? $address->street_extra : null)), array('class'=>'form-control', 'placeholder'=>'', 'style'=>'margin-top:6px')) !!}
</div>

<div class="form-group form-group-default">
    {!! Form::label('organization', 'Organization', array('class'=>'control-label')) !!}
    {!! Form::text(
        'address['.$type.'][organization]',
        old('address['.$type.'][organization]', (!empty($address) ? $address->organization : null)),
        array('class'=>'form-control', 'placeholder'=>'Organization')
    ) !!}
</div>
