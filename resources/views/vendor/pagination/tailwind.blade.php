@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between">
        <div class="flex-1 flex justify-between sm:hidden">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="cursor-not-allowed text-gray-500">&laquo; Previous</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="text-white bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-md">« Previous</a>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="text-white bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-md">Next »</a>
            @else
                <span class="cursor-not-allowed text-gray-500">Next »</span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <span class="text-white mr-6">
                    Showing <span class="font-semibold">{{ $paginator->firstItem() }}</span> to <span class="font-semibold">{{ $paginator->lastItem() }}</span> of <span class="font-semibold">{{ $paginator->total() }}</span> results
                </span>
            </div>

            <div>
                <span class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span class="cursor-not-allowed text-gray-500">&laquo;</span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="bg-gray-800 text-white hover:bg-gray-700 px-3 py-2 rounded-l-md">«</a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        @if (is_string($element))
                            <span class="text-white">{{ $element }}</span>
                        @endif

                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="text-white bg-gray-800 px-3 py-2 rounded-md">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="text-white bg-gray-800 hover:bg-gray-700 px-3 py-2 rounded-md">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" class="bg-gray-800 text-white hover:bg-gray-700 px-3 py-2 rounded-r-md">»</a>
                    @else
                        <span class="cursor-not-allowed text-gray-500">»</span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
