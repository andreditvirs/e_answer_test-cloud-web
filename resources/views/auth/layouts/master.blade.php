
<!DOCTYPE html>
<html lang="en">
  <head>
    @include('auth.components.meta')
    <title>@yield('title', env('APP_NAME'))</title>
    @include('auth.components.style')
    @yield('ext-style', '')
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title"><img src="{{ asset('assets/images/psychoweb-icon.png') }}" width="40"/> <span>{{ env('APP_NAME') }}</span></a>
            </div>

            <div class="clearfix"></div>
            @include('auth.components.menuProfile');
            <br />
            @include('auth.components.sidebar')
          </div>
        </div>

        @include('auth.components.topbar')

        <!-- page content -->
        <div class="right_col" role="main">
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            {{ env('APP_NAME') }} - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>
    @include('auth.components.script')
    @yield('ext-script', '')
  </body>
</html>