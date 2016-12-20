@extends('admin.layouts.main')

@section('title','Phiếu nhập')

@section('content')
    <!--Begin Content -->

    <div class="row tile_count">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="{{ Route('danh_sach_phieu_nhap') }}">Phiếu nhập</a></li>
                    <li>Danh sách báo cáo hết hàng</li>
                    <li class="active">{{ $idBaoCao }}</li>
                </ul>
                </h2>
              </div>

            <div class="clearfix"></div>

            <!-- Table dynamics -->
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    <form action="{{ URL::Route('post_nhap_hang', ['idBaoCao' => $idBaoCao]) }}" method="POST">
                        {{csrf_field()}}
                        <table id="datatable" class="table table-striped table-bordered" name="datatable">
                        <thead>
                            <tr>
                            <th class="col-md-1">STT</th>
                            <th class="col-md-4">Sản phẩm</th>
                            <th class="col-md-2">Đơn giá</th>
                            <th class="col-md-2">Số lượng</th>                         
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($dsChiTietBaoCaoHetHang as $key=>$chiTietHetHang)
                            <tr>
                                <input name="dsChiTietNhapHang[{{ $key+1 }}][idSanPham]" type="hidden" value="{{ $chiTietHetHang->idSanPham }}" />
                                <input name="dsChiTietNhapHang[{{ $key+1 }}][idLoai]" type="hidden" value="{{ $chiTietHetHang->san_pham->idLoai }}" />
                                <td>{{ $key+1 }}</td>
                                <td>{{ $chiTietHetHang->san_pham->TenSP }}</td>
                                <td><input name="dsChiTietNhapHang[{{ $key+1 }}][giaNhap]" type="number" class="form-control" value="{{ $chiTietHetHang->san_pham->GiaNhap }}" /></td>
                                <td><input name="dsChiTietNhapHang[{{ $key+1 }}][soLuongNhap]" type="number" class="form-control" value="{{ $chiTietHetHang->san_pham->SoLuongTonKho }}" /></td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="2">
                                    <center>
                                        <button type="submit" class="btn btn-primary">Nhập hàng</button>
                                    </center>
                                </td>
                            </tr>
                        </tfoot>
                        </table>
                    </form>

                  </div>
                </div>
              </div>
            </div>

            <!-- Table dynamics -->
</div>

    <!-- End Content -->
<script>
function xacnhanxoa (msg) {
	if (window.confirm(msg)) {
		return true;
	}
	return false;
}
</script>
@endsection