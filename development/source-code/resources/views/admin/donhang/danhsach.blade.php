@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')

    @foreach ($dsDonHang as $donHang)
        {{ $donHang -> TenNguoiNhan }}
    @endforeach

    <!--Begin Content -->

    <div class="row tile_count">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="/admin/donhang/danhsach">Đơn hàng</a></li>
                    <li class="active">Danh sách</li>
                </ul>
                </h2>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
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
                    <table id="datatable" class="table table-striped table-bordered" name="datatable">
                      <thead>
                        <tr>
                          <th>Mã đơn hàng</th>
                          <th>Nhân viên</th>
                          <th>Ngày giao</th>
                          <th>Tổng tiền</th>
                          <th>Tình trạng</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>

                      <tbody>
                       @foreach ($dsDonHang as $donHang)
                        <tr>
                            <td>{{$donhang -> MaDonHang}}</td>
                            <td>{{}}</td>
                            <td>System Architect</td>
                            <td>System Architect</td>
                            <td>System Architect</td>
                            <td>
                            <center>
                              <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                              <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                              <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            </center>
                            </td>
                          </tr>
                        @endforeach
                        
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>
                          <center>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </center>
                          </td>
                        </tr>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>
                          <center>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </center>
                          </td>
                        </tr>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>
                          <center>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </center>
                          </td>
                        </tr>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>
                          <center>
                            <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="#" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </center>
                          </td>
                        </tr>
                        
                      </tbody>
                  

                        
                    </table>
                      
                      <div class="pagination_div">
                        <ul class="pagination pagination-sm">
                            <li><a href="#"><<</a></li>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
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

@endsection