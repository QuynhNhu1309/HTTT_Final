@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')

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
              </div>

            </div>
            
            <div class="clearfix"></div>

            <div class="row">

                <!-- Begin User Information Form -->
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Thông tin khách hàng</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form class="form-horizontal form-label-left input_mask">

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="ho_ten" placeholder="Họ và tên">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="so_dien_thoai" placeholder="Số điện thoại">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="dia_chi" placeholder="Địa chỉ">
                                    <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="email" placeholder="Email">
                                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="ln_solid"></div>

                            </form>
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
</div>

    <!-- End Content -->

@endsection