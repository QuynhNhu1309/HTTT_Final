@extends('admin.layouts.main')

@section('title','Trang chủ')

@section('content')
    <!--Begin Content -->

<div class="">
              <div class="page-title">
              <div class="title_left">
                <!-- Breadcrumbs go here -->
                <h2>
                <ul class="breadcrumb">
                    <li><a href="#">Sản phẩm</a></li>
                    <li class="active">Loại sản phẩm</li>
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
                  <div class="x_title">
                    <h2>Default Example <small>Users</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                      DataTables has most features enabled by default, so all you need to do to use it with your own tables is to call the construction function: <code>$().DataTable();</code>
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" name="datatable">
                      <thead>
                        <tr>
                          <th>Mã</th>
                          <th>Họ tên</th>
                          <th>Tên đăng nhập</th>
                          <th>Tình trạng</th>
                          <th>Chức năng</th>
                        </tr>
                      </thead>


                      <tbody>
                        <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>
                          <center>
                            <a href="/admin/nhanvien/sua" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
                            <a href="/admin/nhanvien/sua" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                            <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                          </center>
                          </td>
                          
                        </tr>
                         <tr>
                          <td>Tiger Nixon</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>System Architect</td>
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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
                          <td>
                          <center>
                            <a href="index.php?link=nhan_vien_chi_tiet" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
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