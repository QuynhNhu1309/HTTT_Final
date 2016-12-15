@extends('admin.layouts.main')

@section('title','Sửa Loại Sản Phẩm')

@section('content')
    <!--Begin Content -->



          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h2>
                <ul class="breadcrumb">
                    <li><a href="{{ Route('getLoaiSPList') }}">Loại Sản Phẩm</a></li>
                    @foreach($lsp as $item)
                    <li class="active">{!!  $item->TenLoai !!}</li>
                    @endforeach
                </ul>
                </h2>
              </div>

              
            </div>
            
            <div class="clearfix"></div>

                <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                 
                      
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="">
                        {{ csrf_field() }}
                        @foreach($lsp as $item)
                      <div class="form-group">
                        
                       <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_maloai">Mã Loại: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_maloai" required="required" class="form-control col-md-7 col-xs-12" value="{!!  $item->MaLoai !!}" readonly/>
                        </div>
                        </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="txt_tenloai">Tên Loại: <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="txt_tenloai" required="required" class="form-control col-md-7 col-xs-12" value="{!!  $item->TenLoai !!}"/>
                          @endforeach
                        </div>
                      </div>
                   
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" name="btnLSPSua" class="btn btn-primary">Sửa</button>
                          <button type="reset" class="btn btn-success">Hủy</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

  
        </div>

    <!-- End Content -->

@endsection