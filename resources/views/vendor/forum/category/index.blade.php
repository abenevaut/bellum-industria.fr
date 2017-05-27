{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('frontend.layouts.forum', ['category' => null])

@section ('content')

    <section class="border-bottom-1 border-grey-300 padding-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Forums</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-grey-50 padding-bottom-60">
        <div class="container">
            <div class="headline">

                <h4 class="no-padding-top">
                    {{ trans('forum::general.index') }}
                    {{--<small>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</small>--}}
                </h4>

                <div class="pull-right">
                    @can ('createCategories')

                        <a href="forum-new.html" class="btn btn-primary btn-icon-left"><i class="fa fa-comments"></i> new thread</a>

                        @include ('forum::category.partials.form-create')
                    @endcan

                    <div class="dropdown">
                        <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="#"><i class="fa fa-bar-chart-o"></i> All forums</a></li>
                            <li><a href="#"><i class="fa fa-sort-alpha-asc"></i> Sort forums</a></li>
                            <li class="divider"></li>
                            <li><a href="forum-new.html"><i class="fa fa-plus"></i> New thread</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="forum">


                @foreach ($categories as $category)

                    {{--<tr class="category">--}}
                        {{--@include ('forum::category.partials.list', ['titleClass' => 'lead'])--}}
                    {{--</tr>--}}

                    {{--@if (!$category->children->isEmpty())--}}
                        {{--<tr>--}}
                            {{--<th colspan="5">{{ trans('forum::categories.subcategories') }}</th>--}}
                        {{--</tr>--}}
                        {{--@foreach ($category->children as $subcategory)--}}
                            {{--@include ('forum::category.partials.list', ['category' => $subcategory])--}}
                        {{--@endforeach--}}
                    {{--@endif--}}



                    <div class="forum-group {{ $category->threadsEnabled ? '' : 'lock' }}">
                        <div class="forum-icon">
                            <i class="fa {{ isset($titleClass) ? $titleClass : 'fa-comments' }}"></i>
                        </div>
                        <div class="forum-title">
                            <h4><a href="{{ Forum::route('category.show', $category) }}">{{ $category->title }}</a></h4>
                            <p>{{ $category->description }}</p>
                        </div>
                        <div class="forum-activity">


                            <a href="profile.html"><img src="img/user/avatar.jpg" alt=""></a>


                            <div>
                                <h4><a href="forum-threads.html">Call of Duty Multiplayer</a></h4>
                                <span><a href="profile.html">Admin</a> on March 18, 2016</span>
                            </div>


                        </div>
                        <div class="forum-meta">{{ $category->thread_count }} thread(s)</div>
                    </div>

                @endforeach

            </div>
        </div>
    </section>

@stop
