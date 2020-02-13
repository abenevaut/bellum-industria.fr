@extends('emails.layouts.emails')

@section('content')
	<p>{{ $civility_name }}</p>
	<p>Vous nous avez contacté avec le message suivant :</p>
	<p>{!! $body !!}</p>
	<hr>
	<p>Nous y répondrons dans les plus brefs délais</p>
@endsection
