@extends('longwave::layouts.multigaming_default')

@section('js')
	<script type="text/javascript" src="{{ asset('themes/longwave/js/vitrine/contact.js') }}"></script>
@endsection

@section('content')

	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
			<p>{!! trans('cvepdb/vitrine/contact.title') !!}</p>
		</div>
		<!-- End Inner -->
	</div>
	<!-- End Gray Wrapper -->

	<div style="max-width:100%;overflow:hidden;height:250px;color:red;">
		<div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;">
			<iframe style="height:100%;width:100%;border:0;"
					frameborder="0"
					src="https://www.google.com/maps/embed/v1/place?q=Paris,+France&key={{ env('CVEPDB_GOOGLE_PLACES_API_KEY_JS') }}">
			</iframe>
		</div>
	</div>

	<!-- Begin White Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			<!-- Begin Content -->
			<div class="layout__body-wrapper__content-wrapper__inner__content">
				<h3>{!! trans('cvepdb/vitrine/contact.form_title') !!}</h3>
				<p>{!! trans('cvepdb/vitrine/contact.form_intro') !!}</p>
				<ul class="retina-icons">
					<li style="width:30%;">
						<i class="icon-check-1"></i> {!! trans('cvepdb/vitrine/contact.bullets_one') !!}
					</li>
					<li style="width:30%;">
						<i class="icon-check-1"></i> {!! trans('cvepdb/vitrine/contact.bullets_two') !!}
					</li>
					<li style="width:30%;">
						<i class="icon-check-1"></i> {!! trans('cvepdb/vitrine/contact.bullets_three') !!}
					</li>
				</ul>
				<hr/>

				@foreach($errors->all() as $error)
					<div class="warning-box">{{ $error }}</div>
			@endforeach

			<!-- Begin Form -->
				<div class="form-container">
					<div class="response"></div>
					{!! Form::open(['route' => 'contact.store', 'class' => 'forms js-call-form_validation', 'id' => 'contact']) !!}
					<fieldset>
						<ol>
							<li class="form-row text-input-row name-field">
								{!! Form::text('last_name', (Auth::check() ? Auth::user()->last_name : null), ['required', 'class' => 'form-control text-input', 'placeholder' => trans('cvepdb/vitrine/contact.form_first_name')]) !!}
							</li>
							<li class="form-row text-input-row email-field">
								{!! Form::text('first_name', (Auth::check() ? Auth::user()->first_name : null), ['required', 'class' => 'form-control text-input', 'placeholder' => trans('cvepdb/vitrine/contact.form_last_name')]) !!}
							</li>
							<li class="form-row text-input-row subject-field">
								{!! Form::text('email', (Auth::check() ? Auth::user()->email : null), ['required', 'class' => 'form-control text-input', 'placeholder' => trans('cvepdb/vitrine/contact.form_mail')]) !!}
							</li>
							<li class="form-row text-area-row">
								{!! Form::text('subject', null, ['required', 'class' => 'form-control text-input', 'placeholder' => trans('cvepdb/vitrine/contact.form_subject')]) !!}
							</li>
							<li class="form-row text-area-row">
								{!! Form::textarea('message', null, ['required', 'id' => 'message', 'class' => 'form-control text-area', 'placeholder' => trans('cvepdb/vitrine/contact.form_message')]) !!}
							</li>
							<li class="button-row">
								{!! Form::submit(trans('cvepdb/vitrine/contact.form_button'), ['class'=>'btn-submit']) !!}
							</li>
						</ol>
					</fieldset>
					{!! Form::close() !!}
				</div>
				<!-- End Form -->
			</div>
			<!-- End Content -->
			<!-- Begin Sidebar -->
			<div class="layout__body-wrapper__content-wrapper__inner__sidebar">
				<div class="layout__body-wrapper__content-wrapper__inner__sidebar__sidebox">
					<h3>{!! trans('cvepdb/vitrine/contact.address_title') !!}</h3>
					<i class="icon-mail contact"></i>
					<a href="mailto:multigaming@cvepdb.fr">multigaming@cvepdb.fr</a>
				</div>
			</div>
			<!-- End Sidebar -->
			<div class="clear"></div>

		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End White Wrapper -->

	<!-- Begin Gray Wrapper -->
	<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even">
		<!-- Begin Inner -->
		<div class="layout__body-wrapper__content-wrapper__inner">
			@include('longwave::partials.multigaming.share_inline')
			<div class="clear"></div>
		</div>
		<!-- Begin Inner -->
	</div>
	<!-- End Gray Wrapper -->

@endsection