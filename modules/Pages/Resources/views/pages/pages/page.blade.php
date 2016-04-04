@extends('lumen::layouts.default')

@section('title')
    {{ $page['title'] }}
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">




            <div class="page-header" id="banner" style="min-height: 150px;">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h1>{{ $page['title'] }}</h1>
                        <p class="lead"></p>
                    </div>
                </div>
            </div>


            <div>
                {!! $page['content'] !!}
            </div>


        </div>
    </div>
</div>
@endsection

