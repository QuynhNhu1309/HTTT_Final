@extends('admin.layouts.main')

@section('title','Danh Sách Đơn Hàng')

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
                  @if(Auth::user()->idGroup == 1)
                  <button  class="btn"><a href="/admin/donhang/them">Thêm mới</a></button>
                  @endif
                </div>

                <div class="title_right">

                <form action="" method="GET" name="form_loc">

                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <select class="form-control" name="tinhtrang" id="tinhtrang" >
                                <option value="" @php if($idTinhTrang == null) echo 'selected'; @endphp>Tình trạng</option>
                                @foreach($dsTinhTrang as $tinhTrang)
                                  @if( $tinhTrang->TenBang == 'donhang')
                                  <option value="{{$tinhTrang->id}}" @php if($tinhTrang->id == $idTinhTrang) echo 'selected'; @endphp>{{ $tinhTrang->TinhTrang }}</option>
                                  @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 col-sm-2 col-xs-12">
                        <div class="form-group">
                            <select class="form-control" name="taikhoan" id="taikhoan" >
                                <option value="" @php if($idTaiKhoan == null) echo 'selected'; @endphp>Tài khoản</option>
                                @foreach($dsTaiKhoan as $taiKhoan)
                                <option value="{{$taiKhoan->id}}" @php if($taiKhoan->id == $idTaiKhoan) echo 'selected'; @endphp>{{ $taiKhoan->HoTen }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-1 col-sm-1 col-xs-12">
                      <div class="form-group">
                            <button class="btn btn-default" type="submit">Lọc</button>
                      </div>
                    </div>

                  </form>

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
                            <th class="col-md-1">STT</th>
                            <th class="col-md-2">Mã đơn hàng</th>
                            <th class="col-md-2">Nhân viên</th>
                            <th class="col-md-2">Ngày giao</th>
                            <th class="col-md-1">Tổng tiền</th>
                            <th class="col-md-2">Tình trạng</th>
                            <th class="col-md-2">Chức năng</th>
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
                              <td>{{$donHang -> TinhTrang}}</td>
                              <td>
                                <a href="{{$donHang -> id}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Chi tiết </a>
                                 
                                @if($donHang -> idTinhTrang == 13 && Auth::user()->idGroup == 1)
                                  <a href="{{$donHang -> id}}/sua" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Cập nhật </a>
                                @endif

                
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

                      {{$dsDonHang->appends(['tinhtrang' => $idTinhTrang, 'taikhoan' => $idTaiKhoan])->links()}}
                    </div>
                  </div>
                </div>
              </div>

              <!-- Table dynamics -->
  </div>

      <!-- End Content -->
</div>    

@endsection