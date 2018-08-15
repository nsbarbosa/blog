@if ($paginator->hasPages())
<nav class="pagination is-centered" role="navigation" aria-label="pagination">
    <ul class="pagination-list">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="button is-hidden pagination-previous"><span>&laquo;</span></li>
        @else
        <li><a class="button is-large pagination-previous" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
        <li><span class="pagination-ellipsis">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
        @foreach ($element as $page => $url)
        @if ($page == $paginator->currentPage())
        <li class="pagination-link is-current is-size-4"><span>{{ $page }}</span></li>
        @else
        <li><a class="is-size-4 has-text-black " href="{{ $url }}">{{ $page }}</a></li>
        @endif
        @endforeach
        @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li><a class="button is-large pagination-next" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
        <li class="button is-hidden pagination-link"><span>&raquo;</span></li>
        @endif
    </ul>
</nav>
@endif