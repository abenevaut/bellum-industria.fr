@extends('cvepdb.vitrine.layouts.default')

@section('content')
        <!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">
        <p>{!! trans('cvepdb/vitrine/index.slogan') !!}</p>
    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->

<div style="max-width:100%;overflow:hidden;height:500px;color:red;">
    <div id="canvas-for-google-map" style="height:100%; width:100%;max-width:100%;">
        <iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=37+Rue+Richard+Lenoir,+Paris,+France&key=AIzaSyBv21eN4qM2pCsE2raoVt56vDTtV8Jyct8"></iframe>
    </div>
</div>

<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">
        <!-- Begin Content -->
        <div class="layout__body-wrapper__content-wrapper__inner__content">
            <h3>GET IN TOUCH</h3>
            <p>Contact me if you need anything!</p>
            <ul class="retina-icons">
                <li style="width:30%;"><i class="icon-check-1"></i> Support for software, or information about a product.</li>
                <li style="width:30%;"><i class="icon-check-1"></i> About a purchase that you made or to request a new feature.</li>
                <li style="width:30%;"><i class="icon-check-1"></i> Council / Error Report.</li>
            </ul>
            <hr/>

            @foreach($errors->all() as $error)
                <div class="warning-box">{{ $error }}</div>
            @endforeach

            <!-- Begin Form -->
            <div class="form-container">
                <div class="response"></div>
                {!! Form::open(array('route' => 'contact.store', 'class' => 'forms')) !!}
                    <fieldset>
                        <ol>
                            <li class="form-row text-input-row name-field">
                                {!! Form::text('last_name', null, ['required', 'class' => 'form-control text-input', 'placeholder' => 'Your name']) !!}
                            </li>
                            <li class="form-row text-input-row email-field">
                                {!! Form::text('first_name', null, ['required', 'class' => 'form-control text-input', 'placeholder' => 'Your name']) !!}
                            </li>
                            <li class="form-row text-input-row subject-field">
                                {!! Form::text('email', null, ['required', 'class' => 'form-control text-input', 'placeholder' => 'Your e-mail address']) !!}
                            </li>
                            <li class="form-row text-area-row">
                                {!! Form::text('subject', null, ['required', 'class' => 'form-control text-input', 'placeholder' => 'Subject']) !!}
                            </li>
                            <li class="form-row text-area-row">
                                {!! Form::textarea('message', null, ['required', 'class' => 'form-control text-area', 'placeholder' => 'Your message']) !!}
                            </li>
                            <li class="button-row">
                                {!! Form::submit('Contact Us!', ['class'=>'btn-submit']) !!}
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
                <h3>Address</h3>
                <p>Nous vous recevons dans nos locaux pour discuter de vos projets.</p>
                <i class="icon-location contact"></i> 37 rue Richard Lenoir 75011 Paris<br />
                <i class="icon-phone contact"></i> <a href="tel:+33652478431">+33 6 52 47 84 31</a><br />
                <i class="icon-mail contact"></i> <a href="mailto:contact@cvepdb.fr">contact@cvepdb.fr</a>
            </div>
        </div>
        <!-- End Sidebar -->
        <div class="clear"></div>

        <hr/>
        @include('cvepdb.vitrine.partials.longwave_share_inline')

    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->
@stop