@extends('emails.layouts.emails')

@section('content')
	<p>Nouvelle prise de contact : {{ $civility_name }}</p>
	<p>{!! $body !!}</p>
@endsection
