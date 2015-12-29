@extends('cvepdb.multigaming.layouts.teams')

@section('content')

    <!-- Begin Gray Wrapper -->
    <div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even layout__body-wrapper__content-wrapper--intro">
        <!-- Begin Inner -->
        <div class="layout__body-wrapper__content-wrapper__inner layout__body-wrapper__content-wrapper__inner--intro">


                <h1 class="title alignleft">Teams</h1>

                <div class="layout__body-wrapper__content-wrapper__inner__navigation alignright">
                    <a href="#" id="gwi-thumbs" title="All Items"><i class="icon-th"></i></a>


                    @if (Auth::check())

                    <a href="javascript:void(0);" id="gwi-prev" class="js-teams-add_new_team" title="Add a team"><i class="icon-plus-1"></i></a>

                    @endif

                </div>

                <div class="clear"></div>



        </div>
        <!-- End Inner -->
    </div>
    <!-- End Gray Wrapper -->


    @if (Auth::check())
        <!-- Begin Gray Wrapper -->
        <div class="layout__body-wrapper__content-wrapper layout__body-wrapper__content-wrapper--even js-teams-init js-teams-admin_box"
                style="display:none;">
            <!-- Begin Inner -->
            <div class="layout__body-wrapper__content-wrapper__inner">





                <div class="form-container">
                    <div class="response"></div>
                    <form id="teams_add" class="forms js-call-form_validation" action="" method="post">
                        <fieldset>
                            <ol>
                                <li class="form-row">
                                    <label for="">Team name <span class="required">*</span></label>
                                    <input type="text" name="team_name" class="text-input" title="Team name (Required)">
                                </li>
                                <li class="button-row">
                                    <input type="submit" value="Submit" name="submit" class="btn-submit">
                                </li>
                            </ol>
                        </fieldset>
                    </form>
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


            @foreach ($teams as $team)

            <div class="row">

                <div class="one-third">

                    <a href="{{ url('multigaming/teams/show/'.$team->id) }}" title="{!! $team->name !!}">
                        {!! $team->name !!}
                    </a>

                </div>

                <div class="one-third">

                    @foreach ($team->users as $teammate)

                        {!! $teammate->first_name !!} - {!! $teammate->steam_token !!} <br>

                    @endforeach

                </div>

                <div class="one-third last">



                </div>

            </div>
            <div class="clear"></div>

            @endforeach

        </div>
        <!-- Begin Inner -->
    </div>
    <!-- End White Wrapper -->



@stop