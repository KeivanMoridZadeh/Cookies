@if ($paginator->hasPages())
    <div style="display: flex; justify-content: center; align-items: center; gap: 8px; padding: 16px 0;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: #f3f4f6; color: #9ca3af; border-radius: 6px; cursor: not-allowed;">
                ‹
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
               style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: white; color: #f59e0b; border: 1px solid #fbbf24; border-radius: 6px; text-decoration: none; transition: all 0.2s;">
                ‹
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; color: #6b7280;">
                    {{ $element }}
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: #f59e0b; color: white; border-radius: 6px; font-weight: 600;">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" 
                           style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: white; color: #f59e0b; border: 1px solid #fbbf24; border-radius: 6px; text-decoration: none; font-weight: 500; transition: all 0.2s;">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
               style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: white; color: #f59e0b; border: 1px solid #fbbf24; border-radius: 6px; text-decoration: none; transition: all 0.2s;">
                ›
            </a>
        @else
            <span style="display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; background: #f3f4f6; color: #9ca3af; border-radius: 6px; cursor: not-allowed;">
                ›
            </span>
        @endif
    </div>
@endif