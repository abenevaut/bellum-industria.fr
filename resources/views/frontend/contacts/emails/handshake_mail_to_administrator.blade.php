@extends('frontend.layouts.emails')

@section('content')
	<p>Nouvelle prise de contact : {{ $last_name }} {{ $first_name }} - <a href="mailto:{{ $email }}">{{ $email }}</a></p>

	<p>{!! $body !!}</p>

@endsection
