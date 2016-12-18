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
                    <li class="active">Danh sách báo cáo hết hàng</li>
                </ul>
                </h2>
              </div>

            <div class="clearfix"></div>

            <!-- Table dynamics -->
             <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered" name="datatable">
                      <thead>
                        <tr>
                          <th>STT</th>
                          <th>Tài khoản</th>
                          <th>Ngày tạo</th>
                          <th>Ghi chú</th>
                          <th>Tình Trạng</th>
                          <th><center> Chức năng</center></th>
                        
                         
                        </tr>
                      </thead>

                      <tbody>
                        @foreach($dsBaoCaoHetHang as $key=>$baoCaoHetHang)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $baoCaoHetHang->tai_khoan->HoTen }}</td>
                            <td>{{ $baoCaoHetHang->NgayTao }}</td>
                            <td>{{ $baoCaoHetHang->GhiChu }}</td>
                            <td>{{ $baoCaoHetHang->tinh_trang->TinhTrang }}</td>
                            <td>
                                <center>
                                    <a class="btn btn-xs btn-primary" href="{{ URL::Route('get_nhap_hang', ['idBaoCao' => $baoCaoHetHang->id]) }}">Nhập hàng</a>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                     

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