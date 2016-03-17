@extends('admin.layouts.default')

@section('content')

    <div class="row">

        <div class="col-lg-12">
            <div class="small-box" style="background-color: white;">

                <div class="" style="padding: 5px; ">

                    <a href="{{ url('admin/dashboard/config') }}" class="btn btn-default btn-flat">
                        <i class="fa fa-cog"></i> Settings
                    </a>
                </div>

            </div>
        </div>

    </div>



    <div class="row">

        @if ($widgets->count())
            @foreach ($widgets as $widget)

                {!! Widget::get($widget->name) !!}

            @endforeach
        @else
            <div class="col-lg-12">
                <div class="callout callout-info">
                    <h4>No widget</h4>

                    <p>No widget was set to be displayed.</p>
                </div>
            </div>
        @endif

    </div>
@endsection
