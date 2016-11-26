@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')

    <!--Begin Content -->

    <div class="row tile_count" ng-app = "minxApp" ng-controller = "ThongTinDonHangCtrl">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="/admin/donhang/danhsach">Đơn hàng</a></li>
                    <li class="active">Danh sách đơn hàng</li>
                </ul>
                </h2>
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class = "x_panel">
            <div class="row">

                <!-- Begin User Information Form -->
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thông tin khách hàng</h2>
                            <div class="clearfix"></div>
                        </div>
                        
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" ng-model="maKhachHang" placeholder="Nhập mã hoặc họ tên khách hàng" name="ma_khach_hang" id="search_input">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" ng-click="togglePanelKhachHang()">Tìm</button>
                                </span>
                            </div>
                        </div>

                        <div class="thong_tin_khach_hang col-md-12 col-xs-12">
                            <div class="hien_thi_khach_hang col-md-6 col-xs-6" ng-show="panelKhachHangShow">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h4>Mã khách hàng: @{{khachHangInfo.MaKhachHang}}</h4>
                                        <h4>Họ tên: @{{khachHangInfo.HoTen}}</h4>
                                        <h4>Địa chỉ: @{{khachHangInfo.DiaChi}}</h4>
                                        <h4>Điện thoại: @{{khachHangInfo.DienThoai}}</h4>
                                        <h4>Ngày đăng ký: @{{displayDate(khachHangInfo.NgayDangKy)}}</h4>
                                        <div class="text-right">
                                            <button class="btn btn-primary" ng-click="submitKhachHangInfo()">Địa chỉ nhận khác</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class ="thong_tin_nguoi_nhan col-md-6 col-xs-6" ng-show="panelNguoiNhanShow">
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left input_mask" action="{{URL::Route('them.donhang.post')}}" method="POST">
                                        {{csrf_field()}}

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="ma_khach_hang" type="text" class="form-control has-feedback-left" id="ma_khach_hang" ng-model="ma_khach_hang" readonly value= " @{{khachHangInfo.MaKhachHang}}">
                                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="ho_ten" type="text" class="form-control has-feedback-left" id="ho_ten" ng-model="ho_ten"  maxlength="100" required placeholder="Họ tên">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="so_dien_thoai" type="text" class="form-control has-feedback-left" id="so_dien_thoai" ng-model="so_dien_thoai"  maxlength="11" required placeholder="Số điện thoại">
                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="dia_chi" type="text" class="form-control has-feedback-left" id="dia_chi" ng-model="dia_chi"  maxlength="100" required placeholder="Địa chỉ">
                                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="ngay_giao" type="text" class="form-control has-feedback-left" id="ngay_giao" ng-model="ngay_giao" required placeholder="Ngày giao">
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End User Information Form -->

                <!-- Begin Invoice Form -->
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                                <h2>Thông tin đơn hàng</h2>
                                <div class="clearfix"></div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for..." name="search_input" id="search_input">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button" onclick="search_function()">Go!</button>
                                </span>
                            </div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered" name="datatable">
                            <thead>
                                <tr>
                                <th>STT</th>
                                <th>Mã sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Chức năng</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>SP01</td>
                                    <td>Áo thun 3 lỗ</td>
                                    <td>No-avatar</td>
                                    <td>2000</td>
                                    <td>1</td>
                                    <td>2000</td>
                                    <td>
                                    <center>
                                    <input name="ma_san_pham" value="sp01" type="hidden" />
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
                <!-- End Invoice Form -->
            </div>
                <div class="text-right">
                    <button class="btn btn-primary btn-hoan-tat" ng-click="">Hoàn tất</button>
                </div>
            </div>
</div>

    <!-- End Content -->

@endsection