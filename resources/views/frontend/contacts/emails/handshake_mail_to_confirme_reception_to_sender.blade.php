@extends('frontend.layouts.emails')

@section('content')
	<p>{{ $last_name }} {{ $first_name }}</p>
	<p>Vous nous avez contacté avec le message suivant :</p>
	<p>{!! $body !!}</p>
	<hr>
	<p>Nous y répondrons dans les plus brefs délais</p>

	{{--<table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">--}}
		{{--<tbody>--}}
			{{--<tr>--}}
				{{--<td align="left">--}}
					{{--<table border="0" cellpadding="0" cellspacing="0">--}}
						{{--<tbody>--}}
							{{--<tr>--}}
								{{--<td> <a href="http://htmlemail.io" target="_blank">Call To Action</a> </td>--}}
							{{--</tr>--}}
						{{--</tbody>--}}
					{{--</table>--}}
				{{--</td>--}}
			{{--</tr>--}}
		{{--</tbody>--}}
	{{--</table>--}}
@endsection
