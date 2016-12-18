@extends('admin.layouts.main') @section('title','Thêm đơn hàng') @section('content')

<div class="donhang">

    <!--Begin Content -->
    <div class="row tile_count" ng-app="minxApp" ng-controller="ThongTinDonHangCtrl">
        <div class="page-title">
            <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                    <ul class="breadcrumb">
                        <li><a href="/admin/donhang/danhsach">Đơn hàng</a></li>
                        <li class="active">Thêm đơn hàng</li>
                    </ul>
                </h2>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="x_panel">
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
                                <input type="text" class="form-control" ng-model="maKhachHang" placeholder="Nhập mã khách hàng" name="ma_khach_hang" id="ma_khach_hang">
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

                            <div class="thong_tin_nguoi_nhan col-md-6 col-xs-6" ng-show="panelNguoiNhanShow">
                                <div class="x_content">
                                    <form class="form-horizontal form-label-left input_mask" action="{{URL::Route('them.donhang.post')}}" name= "form_nguoi_nhan" method="POST">
                                        {{csrf_field()}}

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="ma_khach_hang" type="text" class="form-control has-feedback-left" id="ma_khach_hang" readonly value=@{{khachHangInfo.MaKhachHang}}>
                                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="ho_ten" type="text" class="form-control has-feedback-left" id="ho_ten" ng-model="ho_ten" maxlength="100" required placeholder="Họ tên">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="so_dien_thoai" type="text" class="form-control has-feedback-left" id="so_dien_thoai" ng-model="so_dien_thoai" maxlength="11" required placeholder="Số điện thoại">
                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input name="dia_chi" type="text" class="form-control has-feedback-left" id="dia_chi" ng-model="dia_chi" maxlength="100" required placeholder="Địa chỉ">
                                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <!--<input name="ngay_giao" type="text" class="form-control has-feedback-left" id="ngay_giao" ng-model="ngay_giao" required>-->
                                            <input ng-click="open_time()" type="text" placeholder="Ngày giao" class="form-control has-feedback-left" uib-datepicker-popup=@{{format}} ng-model="ngay_giao" is-open="popup1.opened" datepicker-options="dateOptions" ng-required="true" close-text="Close"
                                                alt-input-formats="altInputFormats" />
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
                                <input type="text" ng-model="maSanPham" class="form-control" placeholder="Nhập mã sản phẩm" name="ma_san_pham" id="ma_san_pham">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" ng-click="submitSanPham()">Tìm</button>
                                    </span>
                            </div>
                        </div>
                        <div class="x_content" ng-show="panelSanPhamShow">
                            <table id="datatable" class="table table-striped table-bordered" name="datatable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">STT</th>
                                        <th class="col-md-1">Mã sản phẩm</th>
                                        <th class="col-md-1">Tên sản phẩm</th>
                                        <th class="col-md-1">Đơn giá</th>
                                        <th class="col-md-1">Số lượng</th>
                                        <th class="col-md-1">Thành tiền</th>
                                        <th class="col-md-1">Chức năng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr ng-repeat="sanpham in sanPhamInfo | orderBy : 'MaSP'">
                                        <td>@{{$index + 1}}</td>
                                        <td>@{{sanpham.MaSP}}</td>
                                        <td>@{{sanpham.TenSP}}</td>
                                        <td>@{{sanpham.GiaBanHienTai}}</td>
                                        <td> 
                                            <input type="number" ng-model="sanpham.soLuong" class="form-control" name="so_luong" id="so_luong">
                                        </td>
                                        <td>@{{sanpham.GiaBanHienTai*sanpham.soLuong}}</td>
                                        <td>
                                            <center>
                                                <button class="btn btn-danger btn-xs" ng-click ="removeSanPham(sanpham.MaSP)"><i class="fa fa-trash-o"></i> Delete </button>
                                            </center>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>   
                                        <td colspan="5" class="text-right"><strong>Tổng tiền</strong></td>
                                        <td colspan="2">@{{getTotal()}}</td>
                                    </tr>
                                </tfoot>
                            </table>

                           
                        </div>
                    </div>
                </div>
                <!-- End Invoice Form -->
            </div>
            <div class="text-right">
                <button class="btn btn-primary btn-hoan-tat" ng-click="submitDonHang(form_nguoi_nhan.$valid)">Hoàn tất</button>
            </div>
        </div>
    </div>

    <!-- End Content -->
</div>

@endsection