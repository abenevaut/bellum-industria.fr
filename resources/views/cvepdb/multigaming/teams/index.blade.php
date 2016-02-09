@extends('cvepdb.multigaming.layouts.teams')

@section('content')

    <!-- Begin Gray Wrapper -->
    <div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
        <!-- Begin Inner -->
        <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">


                <h1 class="title alignleft">Teams</h1>

                <div class="layout__body-wrapper__content-wrapper__inner__navigation alignright">
                    {{--<a href="#" id="gwi-thumbs" title="All Items"><i class="icon-th"></i></a>--}}


                    @if (Auth::check() && Auth::user()->hasRole('admin') && Auth::user()->hasPermission('create-team') && Auth::user()->hasPermission('edit-team'))

                    <a href="javascript:void(0);" id="gwi-prev" class="js-teams-add_new_team" title="Add a team"><i class="icon-plus-1"></i></a>

                    @endif

                </div>

                <div class="clear"></div>



        </div>
        <!-- End Inner -->
    </div>
    <!-- End Gray Wrapper -->


    @if (Auth::check() && Auth::user()->hasRole('admin') && Auth::user()->hasPermission('create-team') && Auth::user()->hasPermission('edit-team'))
        <!-- Begin Gray Wrapper -->
        <div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even js-teams-init js-teams-admin_box"
                style="display:none;">
            <!-- Begin Inner -->
            <div class="layout__body-wrapper__content-wrapper__inner">





                <div class="form-container">
                    <div class="response"></div>
                    {!! Form::open(array(
                        'route' => 'teams.store',
                        'method' => 'PUT',
                        'id' => "teams_add",
                        'class' => "forms js-call-form_validation",
                        'data-route_post' => route('teams.store'),
                        'data-route_put' => route('teams.update')
                       )) !!}
                        <fieldset>
                            <ol>
                                <li class="form-row">
                                    {!! Form::label('Team name') !!} <span class="required">*</span>
                                    {!! Form::text('name', null,
                                        array('required',
                                              'class'=>'text-input',
                                              'placeholder'=>'Your name',
                                              'title' => "Team name (Required)"
                                              )) !!}
                                </li>
                                <li class="button-row">
                                    {!! Form::submit('Ajouter', array('class'=>'btn-submit')) !!}
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

            @if ($teams->count())
                @foreach ($teams as $team)

                <div class="row" style="border-bottom: 1px solid #eee; margin-bottom:15px;">

                    <div class="one-third">

                        <a href="{{ url('teams/'.$team->id) }}" title="{!! $team->name !!}">
                            {!! $team->name !!}
                        </a>

                    </div>

                    <div class="one-third">

                        @if ($team->users->count())
                            <ul>
                            @foreach ($team->users as $teammate)
                                    <li>
                                {!! $teammate->first_name !!}
                                {{--{!! $teammate->steam_token !!}--}}
                                </li>
                            @endforeach
                            </ul>
                        @else
                            <div class="info-box">
                            Aucun membre
                            </div>
                        @endif
                    </div>

                    <div class="one-third last">

                        <a href="javascript:void(0);" class="js-teams-edit button orange"
                           style="float:left"
                           data-team_id="{{ $team->id }}"
                           data-team_name="{{ $team->name }}">Edit</a>


                        {!! Form::open(array(
                            'route' => array('teams.destroy', $team->id),
                            'method' => 'DELETE',
                            'class' => "forms js-teams_delete",
                            'style' => "float:left; margin-top: 5px;margin-left: 10px; width:10%;"
                            )) !!}
                        {!! Form::submit('Supprimer', array('class' => 'btn-submit red')) !!}
                        {!! Form::close() !!}

                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>

                @endforeach

{{--                {!! $teams->render() !!}--}}

            @else

                <div class="info-box">
                    Il n'y a aucune équipe pour le moment.
                </div>

            @endif

        </div>
        <!-- Begin Inner -->
    </div>
    <!-- End White Wrapper -->



@stop