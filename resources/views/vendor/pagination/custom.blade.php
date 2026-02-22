@if ($paginator->hasPages())
    <div class="pagination-section">
        
        {{-- Info --}}
        <div class="pagination-info">
            Showing {{ $paginator->firstItem() ?? 0 }}
            to {{ $paginator->lastItem() ?? 0 }}
            of {{ $paginator->total() }} results
        </div>

        {{-- Controls --}}
        <div class="pagination-controls">

            {{-- First --}}
            <button 
                class="page-btn"
                onclick="window.location='{{ $paginator->url(1) }}'"
                @disabled($paginator->onFirstPage())
                aria-label="First"
            >
                &laquo;
            </button>

            {{-- Previous --}}
            <button 
                class="page-btn"
                onclick="window.location='{{ $paginator->previousPageUrl() }}'"
                @disabled($paginator->onFirstPage())
                aria-label="Previous"
            >
                &lsaquo;
            </button>

            {{-- Page Numbers --}}
            @foreach ($elements as $element)

                {{-- Separator --}}
                @if (is_string($element))
                    <button class="page-btn" disabled>...</button>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <button 
                            class="page-btn {{ $page == $paginator->currentPage() ? 'page-btn--active' : '' }}"
                            onclick="window.location='{{ $url }}'"
                        >
                            {{ $page }}
                        </button>
                    @endforeach
                @endif

            @endforeach

            {{-- Next --}}
            <button 
                class="page-btn"
                onclick="window.location='{{ $paginator->nextPageUrl() }}'"
                @disabled(!$paginator->hasMorePages())
                aria-label="Next"
            >
                &rsaquo;
            </button>

            {{-- Last --}}
            <button 
                class="page-btn"
                onclick="window.location='{{ $paginator->url($paginator->lastPage()) }}'"
                @disabled(!$paginator->hasMorePages())
                aria-label="Last"
            >
                &raquo;
            </button>

        </div>
    </div>
@endif