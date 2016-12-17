 
 <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>MINX</span></a>
</div>

<div class="clearfix"></div>


    <!-- menu profile quick info -->
     @if(Auth::check())
        <div class="profile">
            <div class="profile_pic">
                    <img src="{{asset('assets/img/'.Auth::user()->HinhDaiDien)}}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                    <span>Xin chào,</span>
                    <h2>{{ Auth::user()->Username}}</h2>
            </div>
        </div>
@endif
    <!-- /menu profile quick info -->

                <br />



<!-- sidebar menu -->


 <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Trang bán hàng</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Sản phẩm <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('getLoaiSPList') }}">Loại sản phẩm</a></li>
                      <li><a href="{{ route('getSPList') }}">Sản phẩm</a></li>
                    </ul>
                  </li>
                  <?php if(Auth::user()->idGroup == 1 || Auth::user()->idGroup == 3 )
                      {?>
                  <li><a><i class="fa fa-edit"></i> Thông tin cá nhân <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <?php if(Auth::user()->idGroup == 3 )
                      {?>
                      <li><a href="{{ route('danh_sach_nhan_vien') }}">Nhân viên </a></li>
                    <?php } ?>
                      <li><a href="{{ route('danh_sach_khach_hang') }}">Khách hàng</a></li>
                    </ul>
                  </li>
                  <?php } ?>
                 

                 <?php if(Auth::user()->idGroup == 1 || Auth::user()->idGroup == 3)
                      {?>
                  <li><a><i class="fa fa-table"></i> Đơn hàng<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if(Auth::user()->idGroup == 1)
                      {?>
                      <li><a href="/admin/donhang/them">Tạo đơn hàng</a></li>
                      <?php } ?>
                      <li><a href="/admin/donhang/danhsach">Danh sách đơn hàng</a></li>
                      
                    </ul>
                  </li>

                  <?php } ?>

                  <?php if(Auth::user()->idGroup == 3 || Auth::user()->idGroup == 2 )
                      {?>
                   <li><a><i class="fa fa-clone"></i>Kho hàng<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if(Auth::user()->idGroup == 2 )
                      {?>
                      <li><a href="{{ route('get_them_phieu_nhap') }}">Tạo phiếu nhập</a></li>
                      <?php } ?>
                     
                      <li><a href="{{ route('danh_sach_phieu_nhap') }}">Danh sách phiếu nhập</a></li>
                     
                    </ul>
                  </li>
                  <?php } ?>

                  <li><a><i class="fa fa-bar-chart-o"></i> Báo cáo<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php if(Auth::user()->idGroup == 3 || Auth::user()->idGroup == 1 )
                      {?>
                      <li><a href="{{ route('baocao_doanhthu') }}">Doanh thu bán hàng</a></li>
                      <?php } ?>
                      <?php if(Auth::user()->idGroup == 3 || Auth::user()->idGroup == 2)
                      {?>
                      <li><a href="{{ route('baocao_khohang') }}">Kho hàng</a></li>
                      <li><a href="{{ route('baocao_chiphinhap') }}">Chi phí nhập hàng</a></li>
                      <?php } ?>
                     
                 
                      
                    </ul>
                  </li>
                 
                </ul>
              </div>
             

            </div>


<!-- /sidebar menu -->