<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" 
      type="image/png" 
      href="../../assets/logo.png">
    <title>@yield('title')</title>

    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
          
            @include("admin.layouts.left_section")

          </div>
        </div>

<div class="top_nav">
        <!-- top navigation -->
         @include('admin.layouts.top_navigation')
        <!-- /top navigation -->

</div>

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
            @yield('content')
          <?php /*if(isset($_GET['link']))
                {
                  switch($_GET['link'])
                  {
                      case "the_loai" : include("product/the_loai.php");break;
                      case "san_pham" : include("product/san_pham.php");break;
                      case "nhan_vien" : include("account/nhan_vien.php");break;
                      case "nhan_vien_chi_tiet": include("account/nhan_vien_chi_tiet.php"); break;
                  }
                  
                } 
                   else include("product/the_loai.php");
            */       
          ?>
          
          <!-- /top tiles -->
          <br />

        </div>
        <!-- /page content -->




        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    
    

    
     
    @include('admin.partials.assets')

  </body>
</html>
