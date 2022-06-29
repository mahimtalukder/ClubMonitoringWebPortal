@if ($paginator->hasPages())

    <div class="p-3 border-bottom d-flex align-items-center justify-content-between flex-wrap">
        <div class="d-none d-md-flex align-items-center flex-wrap">
            <span class="me-2">Showing {{ $paginator->firstItem() }}-{{ $paginator->lastItem() }} of total {{$paginator->total()}} entries.</span>
        </div>
        <div class="d-flex align-items-center justify-content-end flex-grow-1">

            <div class="btn-group">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="btn btn-outline-secondary btn-icon" type="button"><i data-feather="chevron-left"></i></a>
                @endif


                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')" class="btn btn-outline-secondary btn-icon" type="button"><i data-feather="chevron-right"></i></a>
                @endif
            </div>

        </div>
    </div>

@endif

