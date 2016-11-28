@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')

  <div class="donhang">
      <!--Begin Content -->

      <div class="row tile_count">
                <div class="page-title">
                <div class="title_left">
                  <!-- Breadcrumbs go here -->
                  <h2>
                    <ul class="breadcrumb">
                        <li><a href="/admin/donhang/danhsach">Đơn hàng</a></li>
                        <li class="active">Danh sách đơn hàng</li>
                    </ul>
                  </h2>
                  <button  class="btn"><a href="/admin/donhang/them">Thêm mới</a></button>
                </div>

                <div class="title_right">
                  <ul class="pull-left">
                    <li class="active"><a href="/admin/donhang/danhsach">Tất cả (100)</a></li>
                    <li><a href="/admin/donhang/danhsach?tinhtrang=1">Đã xử lý (10)<a></li>
                    <li><a href="/admin/donhang/danhsach?tinhtrang=0">Chưa xử lý (90)</a></li>
                  </ul>
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Search for..." name="search_input" id="search_input">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="search_function()">Go!</button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="clearfix"></div>

              <!-- Table dynamics -->
              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_content">
                      <table id="datatable" class="table table-striped table-bordered table-hover" name="datatable">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Mã đơn hàng</th>
                            <th>Nhân viên</th>
                            <th>Ngày giao</th>
                            <th>Tổng tiền</th>
                            <th>Tình trạng</th>
                            <th>Chức năng</th>
                          </tr>
                        </thead>

                        <tbody>
                        @foreach ($dsDonHang as $index => $donHang)
                          <tr>
                              <td>{{ $index+1 }}</td>
                              <td>{{$donHang -> MaDonHang}}</td>
                              <td>{{$donHang -> HoTen}}</td>
                              <td>{{$donHang -> Ngaygiao}}</td>
                              <td>{{$donHang -> TongTien}}</td>
                              <td>{{$donHang -> idTinhTrang}}</td>
                              <td>
                              <center>
                                <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                                <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                              </center>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>


                        <div class="pagination_div">
                          <ul class="pagination pagination-sm">
                              <li><a href="#"><<</a></li>
                              <li><a href="/admin/donhang/danhsach?trang=1">1</a></li>
                              <li><a href="/admin/donhang/danhsach?trang=2">2</a></li>
                              <li><a href="/admin/donhang/danhsach?trang=3">3</a></li>
                              <li><a href="/admin/donhang/danhsach?trang=4">4</a></li>
                              <li><a href="/admin/donhang/danhsach?trang=5">5</a></li>
                              <li><a href="#">>></a></li>
                            </ul>
                        </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Table dynamics -->
  </div>

      <!-- End Content -->
</div>    

@endsection