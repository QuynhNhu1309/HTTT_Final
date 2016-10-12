@extends('layouts.main')

@section('title','Đăng nhập')
@section('content')
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Login</strong></div>
            <div class="panel-body">
                <form focus-invalid="focus-invalid" id="loginForm" name="loginForm" action="{{ URL::Route('dangnhap.post') }}" method="POST" novalidate="novalidate" role="form">
                    {{ csrf_field() }}
                    <div class="form-group" ng-class="{ 'has-error': vm.isSubmitted &amp;&amp; loginForm.username.$invalid }"><label for="username">Username:</label><input class="form-control" type="text" id="username" name="ten_dang_nhap" ng-focus="vm.isSubmitted &amp;&amp; loginForm.username.$error" ng-model="vm.user.username" ng-required="true" maxlength="50" placeholder="Enter your username here"
                        />
                    </div>
                    <div class="form-group" ng-class="{ 'has-error': vm.isSubmitted &amp;&amp; loginForm.password.$invalid }"><label for="password">Password:</label><input class="form-control" type="password" id="password" name="mat_khau" ng-model="vm.user.password" ng-required="true" maxlength="50" placeholder="Enter your password here" />
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4 form-group"><button class="btn btn-primary form-control" type="submit">Login</button></div>
                    </div>
                    <div class="form-group">
                        <p class="text-center"><a href="{{ URL::Route('dangky.index') }}">Quên mật khẩu?</a></p>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center">Bạn không có tài khoản? <a href="{{ URL::Route('dangky.index') }}">Đăng ký tài khoản mới </a></p>
    </div>
@endsection