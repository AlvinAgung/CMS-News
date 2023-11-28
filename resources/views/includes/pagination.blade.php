@if ($paginator->hasPages())
{{-- <div class="row"> --}}
    <div class="gt-pagination">
        <nav aria-label="navigation">

            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class=" page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                @else
                    <li>
                        <li class=" page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li class="disabled" aria-disabled="true"><span >{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item active" style="background-color: #008374;" aria-current="page"><span  class="page-link">{{ $page }}</span></li>
                            @else 
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}"  class="page-link"><i class="fas fa-angle-right"></i></a></li>
                @else
                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-right"></i></a></li>
                @endif
            </ul>
        </nav>
    </div>
{{-- </div> --}}
@endif
