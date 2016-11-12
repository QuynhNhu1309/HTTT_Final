<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Đăng Nhập </title>

     @include('admin.partials.assets')

     
  </head>

  <body>
    <br/>
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-custom">
            <div class="panel-heading"><center><strong><h3>ĐĂNG NHẬP</h3></strong></center></div>
            <div class="panel-body">

                   
                    @if(session('thongbao'))
                    <div class="alert alert-danger">
                        {{session('thongbao')}}
                    </div>
                    @endif

                <form action="{{ URL::Route('postDangNhap') }}" method="POST" novalidate="novalidate" name="form_login" ng-app="myApp"  ng-controller="validateCtrl">
                    {{ csrf_field() }}
                    <div class="form-group">
                    <label for="txtUser">Tên đăng nhập</label>
                    
                    <input class="form-control" type="text" id="txtUser" name="txtUser" ng-model="txtUser" ng-required="true" maxlength="50" placeholder="Enter your username here"
                        />
                    <span style="color:red" ng-show="form_login.txtUser.$dirty && form_login.txtUser.$invalid">
                    <span ng-show="form_login.txtUser.$error.required">Vui lòng nhập tên đăng nhập.</span>
                    </span>

                    </div>

                    <div class="form-group">
                    <label for="txtPass">Mật khẩu</label>
                    
                    <input class="form-control" type="password" id="txtPass" name="txtPass" ng-model="txtPass" ng-required="true" maxlength="50" placeholder="Enter your password here" />

                    <span style="color:red" ng-show="form_login.txtPass.$dirty && form_login.txtPass.$invalid">
                    <span ng-show="form_login.txtPass.$error.required">Vui lòng nhập mật khẩu .</span>
                    </span>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 form-group"><button class="btn btn-primary form-control" type="submit" ng-disabled="form_login.txtUser.$dirty && form_login.txtUser.$invalid ||form_login.txtPass.$dirty && form_login.txtPass.$invalid">Login</button></div>
                    </div>
                    <div class="form-group">
                        <p class="text-center"><a href="{{ URL::Route('getDangKy') }}">Quên mật khẩu?</a></p>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center">Bạn không có tài khoản? <a href="{{ URL::Route('getDangKy') }}">Đăng ký tài khoản mới </a></p>
    </div>

    <script>
var app = angular.module('myApp', []);
app.controller('validateCtrl', function($scope) {
    $scope.txtUser = 'nhu';
    $scope.txtPass = 'nhu';
});
</script>

  </body>
</html>
