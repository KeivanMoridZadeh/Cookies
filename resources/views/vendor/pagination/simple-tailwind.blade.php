@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Simple Pagination Navigation" class="flex items-center justify-between py-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="flex items-center px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Previous
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" 
               class="flex items-center px-3 py-2 text-sm text-amber-600 bg-white border border-amber-200 rounded-md hover:bg-amber-50 hover:border-amber-300 transition-colors duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Previous
            </a>
        @endif

        {{-- Current Page Info --}}
        <span class="px-3 py-2 text-sm text-amber-700 bg-amber-50 rounded-md border border-amber-200">
            Page {{ $paginator->currentPage() }}
        </span>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" 
               class="flex items-center px-3 py-2 text-sm text-amber-600 bg-white border border-amber-200 rounded-md hover:bg-amber-50 hover:border-amber-300 transition-colors duration-150">
                Next
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        @else
            <span class="flex items-center px-3 py-2 text-sm text-gray-400 bg-gray-100 rounded-md cursor-not-allowed">
                Next
                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        @endif
    </nav>
@endif