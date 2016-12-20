<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Login | </title>

     @include('admin.partials.css-assets')
  </head>

  <body class="login">
    
    
      

      <div class="login_wrapper">

        <div>
          <section class="login_content">
            <form method="POST" action="{{ URL::Route('postDangKy') }}">
            {{ csrf_field() }}
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" name="txtUser" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" name="txtEmail" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" name="txtPass" required="" />
              </div>
              
              <div>
                <input type="text" class="form-control" placeholder="Your Name" required="" name="txtName" />
              </div>

              <input type="submit" name="btnLogin" value="Đăng ký" class="btn btn-default submit" />

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Minx Design</h1>
                  <p>©2016 All Rights Reserved. Minx Design.</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
   
  </body>
</html>
