@extends('layouts.san-pham')

@section('title','Laravel')

@section('content')
    <h4>Tạo sản phẩm mới</h4>
    <form>
        <label for="ten">Tên</label>
        <input class="form-control" name="ten" />
        <label for="danhmuc">Danh mục</label>
        <select class="form-control"id="danhmuc" name="danhmuc">
            @foreach ($dsDanhMucSanPham as $danhMucSanPham)
                <option>{{$danhMucSanPham->ten}}</option>
            @endforeach
        </select>
        <label for="gia">Giá</label>
        <input class="form-control" name="gia" />
        <label for="nhasanxuat">Nhà sản xuất</label>
        <input class="form-control" name="nhasanxuat" />
        <label for="soluong">Số lượng tồn kho</label>
        <input class="form-control" name="soluong" />
        <label for="mota">Mô tả</label>
        <textarea class="form-control" rows="3" name="mota"></textarea>
    </form>

    <button ng-click="vm.showSanPhamList()">Xem</button>
    <p ng-repeat="sanpham in dssanpham"><% sanpham %></p>
@endsection