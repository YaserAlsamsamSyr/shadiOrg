@if ($paginator->hasPages())

       <div class="row">
        {{-- Previous Page Link --}}
        <div class="col-1"></div>
         <div class="col-3">
        @if ($paginator->onFirstPage())

            <p class="disabled" style="font-size:22px"><span>← السابق</span></p>

        @else

            <p style="font-size:22px"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">← السابق</a></p>

        @endif


    </div>

    <div class="col-4">
        {{-- Pagination Elements --}}
        {{-- @foreach ($paginator as $element)

            {{-- "Three Dots" Separator --}

            @if (is_string($element))

                <p class="disabled"><span>{{ $element }}</span></p>

            @endif



            {{-- Array Of Links --}

            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <p class="active my-active"><span>{{ $page }}</span></p>

                    @else

                        <p><a href="{{ $url }}">{{ $page }}</a></p>

                    @endif

                @endforeach

            @endif

        @endforeach --}}

    </div>
    <div class="col-3">

        {{-- Next Page link --}}

        @if ($paginator->hasMorePages())

            <p style="font-size:22px"><a href="{{ $paginator->nextPageUrl() }}" rel="next">التالي →</a></p>

        @else

            <p class="disabled" style="font-size:22px"><span>التالي →</span></p>

        @endif
    </div>
    </div>
@endif