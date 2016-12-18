 
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
              @if(Auth::check())
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('assets/img/'.Auth::user()->HinhDaiDien)}}" alt="">{{ Auth::user()->Username}} 

                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">

                    <li><a href="{{ route('getDangXuat') }}"><i class="fa fa-sign-out pull-right"></i>Đăng xuất</a></li>
                   
                  </ul>
                </li>
                 @endif

                
              </ul>
            </nav>
          </div>
        