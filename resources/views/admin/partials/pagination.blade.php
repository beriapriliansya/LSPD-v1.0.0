@if ($paginator->hasPages())
  <div class="admin-pagination-wrapper">
    <div class="admin-pagination-info">
      Menampilkan <strong style="color: var(--admin-gold);">{{ $paginator->firstItem() }}</strong> - <strong style="color: var(--admin-gold);">{{ $paginator->lastItem() }}</strong> dari <strong style="color: #ffffff;">{{ $paginator->total() }}</strong> data
    </div>

    <div class="admin-pagination-links">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <span class="admin-pagination-btn disabled"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</span>
      @else
        <a href="{{ $paginator->previousPageUrl() }}" class="admin-pagination-btn"><i class="fa-solid fa-chevron-left"></i> Sebelumnya</a>
      @endif

      {{-- Page Numbers --}}
      @foreach ($elements as $element)
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <span class="admin-pagination-btn active">{{ $page }}</span>
            @else
              <a href="{{ $url }}" class="admin-pagination-btn">{{ $page }}</a>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="admin-pagination-btn">Berikutnya <i class="fa-solid fa-chevron-right"></i></a>
      @else
        <span class="admin-pagination-btn disabled">Berikutnya <i class="fa-solid fa-chevron-right"></i></span>
      @endif
    </div>
  </div>
@endif
