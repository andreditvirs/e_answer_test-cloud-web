<!DOCTYPE html>
<html lang="en">
  <head>
    @include('general.components.meta')
    <title>@yield('title', env('APP_NAME'))</title>
    @include('general.components.style')
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        @yield('content')
      </div>
    </div>
  </body>
</html>
