<!--Begin_navbar_top-->
<nav class="navbar navbar-default navbar-light" role="navigation">
    <div class="container">
        <ul class="nav navbar-nav">
            <li><a href="#">Kênh Người Bán</a></li>
            <li><a href="#">Trợ Giúp</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
        @if (!Auth::guard('web')->user())
            <li><a href="{{ URL::Route('dangky.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>Đăng Ký</a></li>
            <li><a href="{{ URL::Route('dangnhap.index') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng Nhập</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::guard('web')->user()->ten_dang_nhap }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="{{ URL::Route('dangxuat.post') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Đăng xuất
                        </a>

                        <form id="logout-form" action="{{ URL::Route('dangxuat.post') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
        </ul>
    </div>
</nav>
<!--End_navbar_top-->
