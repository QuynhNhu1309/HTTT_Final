@extends('admin.layouts.main') @section('title','Chi tiết đơn hàng') @section('content')

<div class="donhang">

    <!--Begin Content -->
    <div class="row tile_count" ng-app="minxApp" ng-controller="ThongTinDonHangCtrl">
        <div class="page-title">
            <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                    <ul class="breadcrumb">
                        <li><a href="/admin/donhang/danhsach">Đơn hàng</a></li>
                        <li class="active">Chi tiết đơn hàng</li>
                    </ul>
                </h2>
            </div>

        </div>

        <div class="clearfix"></div>

        <div class="x_panel">
            <div class="row">

                <!-- Begin User Information -->
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thông tin khách hàng</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="thong_tin_khach_hang col-md-12 col-xs-12">
                            <div class="hien_thi_khach_hang col-md-6 col-xs-6">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <h4>Mã khách hàng: {{$thongTinKhachHang->MaKhachHang}}</h4>
                                        <h4>Họ tên: {{$thongTinKhachHang->HoTen}}</h4>
                                        <h4>Địa chỉ: {{$thongTinKhachHang->DiaChi}}</h4>
                                        <h4>Điện thoại: {{$thongTinKhachHang->DienThoai}}</h4>
                                        <h4>Ngày đăng ký: {{$thongTinKhachHang->NgayDangKy}}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="thong_tin_nguoi_nhan col-md-6 col-xs-6">
                                <div class="x_content">
                                    <div class="form-horizontal form-label-left input_mask">

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" readonly value="{{$thongTinKhachHang->MaKhachHang}}">
                                            <span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" readonly value="{{$donHang->TenNguoiNhan}}">
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" readonly value="{{$donHang->DTNguoiNhan}}">
                                            <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" readonly value="{{$donHang->DiaChi}}">
                                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" readonly value="{{$donHang->Ngaygiao}}">
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- End User Information -->

                <!-- Begin Invoice Form -->
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thông tin đơn hàng</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="datatable" class="table table-striped table-bordered" name="datatable">
                                <thead>
                                    <tr>
                                        <th class="col-md-1">STT</th>
                                        <th class="col-md-1">Mã sản phẩm</th>
                                        <th class="col-md-1">Tên sản phẩm</th>
                                        <th class="col-md-1">Đơn giá</th>
                                        <th class="col-md-1">Số lượng</th>
                                        <th class="col-md-1">Thành tiền</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($dsChiTietDonHang as $key=>$chiTietDonHang)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$chiTietDonHang->MaSP}}</td>
                                            <td>{{$chiTietDonHang->TenSP}}</td>
                                            <td>{{$chiTietDonHang->Gia}}</td>
                                            <td>{{$chiTietDonHang->SoLuong}}</td>
                                            <td>{{$chiTietDonHang->Gia*$chiTietDonHang->SoLuong}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>   
                                        <td colspan="5" class="text-right"><strong>Tổng tiền</strong></td>
                                        <td colspan="2">{{$donHang->TongTien}}</td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="pagination_div">
                                <ul class="pagination pagination-sm">
                                    <li>
                                        <a href="#">
                                            <<</a>
                                    </li>
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
        </div>
    </div>

    <!-- End Content -->
</div>

@endsection