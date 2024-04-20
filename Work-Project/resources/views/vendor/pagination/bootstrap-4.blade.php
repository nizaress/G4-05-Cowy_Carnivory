@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="page-link page-item disabled" style="background-color: #e9ecef; color: #6c757d; font-size: 20px; padding: 3px; border-radius: 50%; border: 2px solid #4CAF50;">&lsaquo;</span>
                <br>
                <br>
                
            @else
                <a class="page-link page-item" href="{{ $paginator->previousPageUrl() }}" style="background-color: #4CAF50; color: white; font-size: 20px; padding: 3px; border-radius: 50%; border: 2px solid #45a0aa;" rel="prev">&lsaquo;</a>
                <br>
                <br>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled"><span class="page-link" style="background-color: #4CAF50; color: white; font-size: 20px;">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="page-item active" style="background-color: #4CAF50; font-size: 20px; padding: 5px; border-radius: 50%; border: 2px solid #45a0aa;"><span class="page-link" style="background-color: #45a0aa; color: white; border-color: #4CAF50; border-radius: 50%; padding: 5px;">{{ $page }}</span></span>
                        @else
                            <span class="page-item"><a class="page-link" href="{{ $url }}" style="background-color: white; color: #4CAF50; font-size: 20px; padding: 5px; border-radius: 50%; border: 2px solid #4CAF50;">{{ $page }}</a></span>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <br>
                <br>
                <a class="page-link page-item" href="{{ $paginator->nextPageUrl() }}" style="background-color: #4CAF50; color: white; font-size: 20px; padding: 3px; border-radius: 50%; border: 2px solid #45a0aa;" rel="next">&rsaquo;</a>
                
            @else
                <br>
                <br>
                <span class="page-link page-item disabled" style="background-color: #e9ecef; color: #6c757d; font-size: 20px; padding: 3px; border-radius: 50%; border: 2px solid #4CAF50;">&rsaquo;</span>
            @endif
        </ul>
    </nav>
@endif
