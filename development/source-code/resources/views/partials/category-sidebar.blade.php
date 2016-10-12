<div class="category-sidebar">
    @if (count($dsDanhMucSanPham) > 0)
        <ul>
        @foreach ($dsDanhMucSanPham as $danhMucSanPham)
            <li><a href="{{  URL::route('danhmuc.show', $danhMucSanPham->slug) }}">{{ $danhMucSanPham->ten }}</a></li>
        @endforeach
        </ul>
    @endif
</div>