{{-- $category is passed as NULL to the master layout view to prevent it from showing in the breadcrumbs --}}
@extends ('frontend.layouts.forum', ['thread' => null])

@section ('content')

    <section class="border-bottom-1 border-grey-300 padding-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('frontend.home') }}">Accueil</a></li>
                        <li class="active"><a href="{{ route('forum.index') }}">Forums</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>





    <div id="category">



        @if (!$category->children->isEmpty())
            <table class="table table-category">
                <thead>
                    <tr>
                        <th>{{ trans_choice('forum::categories.category', 1) }}</th>
                        <th class="col-md-2">{{ trans_choice('forum::threads.thread', 2) }}</th>
                        <th class="col-md-2">{{ trans_choice('forum::posts.post', 2) }}</th>
                        <th class="col-md-2">{{ trans('forum::threads.newest') }}</th>
                        <th class="col-md-2">{{ trans('forum::posts.last') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category->children as $subcategory)
                        @include ('forum::category.partials.list', ['category' => $subcategory])
                    @endforeach
                </tbody>
            </table>
        @endif

        <div class="row">
            <div class="col-xs-4">
                @if ($category->threadsEnabled)
                    @can ('createThreads', $category)
                        <a href="{{ Forum::route('thread.create', $category) }}" class="btn btn-primary">{{ trans('forum::threads.new_thread') }}</a>
                    @endcan
                @endif
            </div>
            <div class="col-xs-8 text-right">
                {!! $threads->render() !!}
            </div>
        </div>

        @can ('manageThreads', $category)
            <form action="{{ Forum::route('bulk.thread.update') }}" method="POST" data-actions-form>
                {!! csrf_field() !!}
                {!! method_field('delete') !!}
                @endcan

                @if ($category->threadsEnabled)
                    <table class="table table-thread">
                        <thead>
                            <tr>
                                <th>{{ trans('forum::general.subject') }}</th>
                                <th class="col-md-2 text-right">{{ trans('forum::general.replies') }}</th>
                                <th class="col-md-2 text-right">{{ trans('forum::posts.last') }}</th>
                                @can ('manageThreads', $category)
                                    <th class="col-md-1 text-right"><input type="checkbox" data-toggle-all></th>
                                @endcan
                            </tr>
                        </thead>
                        <tbody>
                            @if (!$threads->isEmpty())
                                @foreach ($threads as $thread)
                                    <tr class="{{ $thread->trashed() ? "deleted" : "" }}">
                                        <td>
                                    <span class="pull-right">
                                        @if ($thread->locked)
                                            <span class="label label-warning">{{ trans('forum::threads.locked') }}</span>
                                        @endif
                                        @if ($thread->pinned)
                                            <span class="label label-info">{{ trans('forum::threads.pinned') }}</span>
                                        @endif
                                        @if ($thread->userReadStatus && !$thread->trashed())
                                            <span class="label label-primary">{{ trans($thread->userReadStatus) }}</span>
                                        @endif
                                        @if ($thread->trashed())
                                            <span class="label label-danger">{{ trans('forum::general.deleted') }}</span>
                                        @endif
                                    </span>
                                            <p class="lead">
                                                <a href="{{ Forum::route('thread.show', $thread) }}">{{ $thread->title }}</a>
                                            </p>
                                            <p>{{ $thread->authorName }} <span class="text-muted">({{ $thread->posted }})</span></p>
                                        </td>
                                        @if ($thread->trashed())
                                            <td colspan="2">&nbsp;</td>
                                        @else
                                            <td class="text-right">
                                                {{ $thread->reply_count }}
                                            </td>
                                            <td class="text-right">
                                                {{ $thread->lastPost->authorName }}
                                                <p class="text-muted">({{ $thread->lastPost->posted }})</p>
                                                <a href="{{ Forum::route('thread.show', $thread->lastPost) }}" class="btn btn-primary btn-xs">{{ trans('forum::posts.view') }} &raquo;</a>
                                            </td>
                                        @endif
                                        @can ('manageThreads', $category)
                                            <td class="text-right">
                                                <input type="checkbox" name="items[]" value="{{ $thread->id }}">
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        {{ trans('forum::threads.none_found') }}
                                    </td>
                                    <td class="text-right" colspan="3">
                                        @can ('createThreads', $category)
                                            <a href="{{ Forum::route('thread.create', $category) }}">{{ trans('forum::threads.post_the_first') }}</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                @endif

                @can ('manageThreads', $category)
                    @include ('forum::category.partials.thread-actions')
            </form>
        @endcan

        <div class="row">
            <div class="col-xs-4">
                @if ($category->threadsEnabled)
                    @can ('createThreads', $category)
                        <a href="{{ Forum::route('thread.create', $category) }}" class="btn btn-primary">{{ trans('forum::threads.new_thread') }}</a>
                    @endcan
                @endif
            </div>
            <div class="col-xs-8 text-right">
                {!! $threads->render() !!}
            </div>
        </div>

        @if ($category->threadsEnabled)
            @can ('markNewThreadsAsRead')
                <hr>
                <div class="text-center">
                    <form action="{{ Forum::route('mark-new') }}" method="POST" data-confirm>
                        {!! csrf_field() !!}
                        {!! method_field('patch') !!}
                        <input type="hidden" name="category_id" value="{{ $category->id }}">
                        <button class="btn btn-default btn-small">{{ trans('forum::categories.mark_read') }}</button>
                    </form>
                </div>
            @endcan
        @endif
    </div>



    <section class="bg-grey-50 padding-bottom-60">
        <div class="container">
            <div class="headline">

                <h4 class="no-padding-top">
                    {{ $category->title }}
                    @if ($category->description)
                        <small>{{ $category->description }}</small>
                    @endif
                </h4>

                <div class="pull-right">


                    @can ('manageCategories')
                        <form action="{{ Forum::route('category.update', $category) }}" method="POST" data-actions-form>
                            {!! csrf_field() !!}
                            {!! method_field('patch') !!}

                            @include ('forum::category.partials.actions')
                        </form>
                    @endcan




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
