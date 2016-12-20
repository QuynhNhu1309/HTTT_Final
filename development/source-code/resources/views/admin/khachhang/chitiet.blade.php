@extends('admin.layouts.main')

@section('title','Chi tiết khách hàng')

@section('content')
    <!--Begin Content -->
        
        <!-- page content -->
        
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Chi tiết khách hàng</h3>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Khách hàng</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                      <?php
                          if(isset($chi_tiet_khach_hang))
                          {
                      ?>   
                      @foreach($chi_tiet_khach_hang as $item)
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mã khách hàng <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" readonly value =" {!! $item -> KH_MaKhachHang !!}">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Họ tên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" required="required" class="form-control col-md-7 col-xs-12" readonly value =" {{ $item -> KH_HoTen }}">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Địa chỉ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last-name" required="required" class="form-control col-md-7 col-xs-12" readonly value =" {!! $item -> KH_DiaChi !!}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="middle-name" readonly value =" {!! $item -> KH_DienThoai !!}">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày đăng ký <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly value =" {!! $item -> KH_NgayDangKy !!}">
                        </div>
                      </div>
                      
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Ngày cập nhật <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" readonly value =" {!! $item -> KH_NgayCapNhat !!}">
                        </div>
                      </div>
                      
                      
                    
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Người tạo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" tabindex="-1" readonly>
                        
                            <option value="" selected >{!! $item -> TK_HoTen !!}</option>

                          </select>
                        </div>
                      </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href ="{!! route('danh_sach_khach_hang') !!}"><button type="button" class="btn btn-primary">Trở về</button></a>
                       
                        </div>
                      </div>

                        @endforeach
                      <?php } ?>

                    </form>



                    </div>
                </div>
              </div>
            </div>
          </div>
     @endsection