@extends('cvepdb.multigaming.layouts.teams')

@section('content')

        <!-- Begin Gray Wrapper -->
<div
        class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">


        <h1 class="title alignleft"> {!! $team->name !!}</h1>

        <div class="layout__body-wrapper__content-wrapper__inner__navigation alignright">
            <a href="{{ url('multigaming/teams') }}" id="gwi-thumbs" title="All Items"><i class="icon-th"></i></a>
        </div>

        <div class="clear"></div>



    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->


<!-- Begin White Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--odd">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">



        @foreach ($team->users as $teammate)

            {!! $teammate->first_name !!} - {!! $teammate->steam_token !!} <br>

        @endforeach


    </div>
    <!-- Begin Inner -->
</div>
<!-- End White Wrapper -->



@stop