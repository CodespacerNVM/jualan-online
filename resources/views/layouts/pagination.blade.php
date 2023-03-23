    <nav>
        <ul class="pagination flex">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

    <div class="flex pt-8 lg:pt-16 gap-2">

        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="flex items-center px-3 py-1 font-medium transition-colors border-2 cursor-pointer group border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary"><i
                    class="mr-1 transition-colors bx bx-left-arrow-alt text-primary group-hover:text-secondary dark:text-white"></i>
                Previous
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="px-3 py-1 font-medium font-body">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="px-3 py-1 font-medium border-2 cursor-pointer border-secondary font-body text-secondary">{{ $page }}</span>
                    @else
                        <a class="px-3 py-1 font-medium transition-colors border-2 cursor-pointer border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary"
                            href="{{ $url }}">{{ $page }}</a></span>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="flex items-center px-3 py-1 font-medium transition-colors border-2 cursor-pointer group border-primary font-body text-primary hover:border-secondary hover:text-secondary dark:border-green-light dark:text-white dark:hover:border-secondary dark:hover:text-secondary">Next
                <i
                    class="ml-1 transition-colors bx bx-right-arrow-alt text-primary group-hover:text-secondary dark:text-white"></i></a>
        @endif


    </div>
