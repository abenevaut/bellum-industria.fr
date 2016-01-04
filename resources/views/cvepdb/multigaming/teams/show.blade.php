@extends('cvepdb.multigaming.layouts.teams')

@section('content')

        <!-- Begin Gray Wrapper -->
<div
        class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">


        <h1 class="title alignleft"> {!! $team->name !!}</h1>

        <div class="layout__body-wrapper__content-wrapper__inner__navigation alignright">
            <a href="{{ url('teams') }}" id="gwi-thumbs" title="All Items"><i class="icon-th"></i></a>

            @if (Auth::check() && Auth::user()->hasRole('admin') && Auth::user()->can('create-team') && Auth::user()->can('edit-team'))

                <a href="javascript:void(0);" id="gwi-prev" class="js-teams-add_new_team" title="Add a team"><i class="icon-plus-1"></i></a>

            @endif


        </div>

        <div class="clear"></div>



    </div>
    <!-- End Inner -->
</div>
<!-- End Gray Wrapper -->


@if (Auth::check() && Auth::user()->hasRole('admin') && Auth::user()->can('create-team') && Auth::user()->can('edit-team'))
        <!-- Begin Gray Wrapper -->
<div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even js-teams-init js-teams-admin_box"
     style="display:none;">
    <!-- Begin Inner -->
    <div class="layout__body-wrapper__content-wrapper__inner">





        <div class="form-container">
            <div class="response"></div>
            {!! Form::open(array(
                'route' => array('teams_put', $team->id),
                'method' => 'PUT',
                'id' => "team_add_members",
                'class' => "forms js-call-form_validation js-call-select2"
               )) !!}
            <fieldset>
                <ol>
                    <li class="form-row">
                        {!! Form::label('Teammate') !!} <span class="required">*</span>
                        {!! Form::select('members', $users, array_column($team->users->toArray(), 'id'), ['multiple' => 'multiple', 'name' => 'members[]']) !!}
                        {!! Form::hidden('name', $team->name) !!}
                    </li>
                    <li class="button-row">
                        {!! Form::submit('Submit', array('class'=>'btn-submit')) !!}
                    </li>
                </ol>
            </fieldset>
            {!! Form::close() !!}
        </div>


    </div>
    <!-- Begin Inner -->
</div>
<!-- End Gray Wrapper -->
@endif

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