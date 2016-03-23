@if ($paginator->lastPage() > 1)
    <ul class="pagination pagination-sm no-margin pull-right">
        @if ($paginator->currentPage() != 1)
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}">{{ trans('global.previous') }}</a>
        </li>
        @endif
        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        @if ($paginator->currentPage() != $paginator->lastPage())
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >{{ trans('global.next') }}</a>
        </li>
        @endif
    </ul>
@endif