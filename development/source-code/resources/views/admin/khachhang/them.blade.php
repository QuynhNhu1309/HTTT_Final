@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')
    <!--Begin Content -->
        
        <!-- page content -->
        
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Thêm khách hàng</h3>
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

                     @if(count($errors) > 0 )
                  <div class="alert alert-danger" fade in>
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    @foreach($errors->all() as $err)
                        {{ $err }}<br/>
                    @endforeach
                  </div>
                  @endif
                  
                    <form action="{{ URL::Route('post_them_khach_hang') }}" method="POST" name="form_them_kh"  enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                    {{ csrf_field() }}

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_hoten">Họ tên <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_hoten" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_diachi">Địa chỉ <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_diachi" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="txt_sdt" class="control-label col-md-3 col-sm-3 col-xs-12">Điện thoại</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="txt_sdt">
                        </div>
                      </div>
                      
                
                    
                      <div class="text-center">
                                        <br/>
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Thêm</button>
                                        <button type="reset" class="btn btn-success btn-fill btn-wd">Hủy</button>
                                    </div>
                                    <div class="clearfix"></div>

                     

                    </form>



                    </div>
                </div>
              </div>
            </div>
          </div>
     @endsection