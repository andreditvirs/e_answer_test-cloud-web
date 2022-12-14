<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav pr-5">
          <ul class="navbar-right">
            <li class="nav-item dropdown open" style="padding-left: 15px;">
              <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('v1/production/images/user.png') }}" alt="">{{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                <form id="logout-form" method="POST" action="{{ route('general.auth.logout') }}">
                  @csrf
                </form>
                <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit()"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
              </div>
            </li>
          </ul>
        </nav>
    </div>
</div>