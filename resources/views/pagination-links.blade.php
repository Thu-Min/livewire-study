@if ($paginator->hasPages())

<ul class="flex justify-between">
    @if ($paginator->onFirstPage())
        <li class="w-16 px-2 py-1 text-center rounded border shadow bg-gray-200 cursor-pointer">Prev</li>
    @else
        <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="previousPage">Prev</li>
    @endif

    <div class="flex justify-content-middle">
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-gray-200 cursor-pointer"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="mx-2 w-10 px-2 py-1 text-center rounded border shadow bg-white"><button type="button" class="page-link" wire:click="gotoPage({{ $page }})">{{ $page }}</button></li>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>

    @if ($paginator->hasMorePages())
        <li class="w-16 px-2 py-1 text-center rounded border shadow bg-white cursor-pointer" wire:click="nextPage">Next</li>
    @else
        <li class="w-16 px-2 py-1 text-center rounded border shadow bg-gray-200 cursor-pointer">Next</li>
    @endif
</ul>

@endif
