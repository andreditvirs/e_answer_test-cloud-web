<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Fitur</h3>
      <ul class="nav side-menu">
        <li><a href="{{ route('auth.dashboard.index') }}"><i class="fa fa-laptop"></i> Beranda</a></li>
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'psychologist' || Auth::user()->role == 'operator')
          <li><a><i class="fa fa-edit"></i> Master Data <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('auth.company.index') }}">Perusahaan</a></li>
              <li><a href="{{ route('auth.user.index') }}">Pengguna</a></li>
            </ul>
          </li>
        @endif
        @if (Auth::user()->role == 'user')
          <li><a><i class="fa fa-edit"></i> Ujian <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('auth.test.list') }}">Jenis Lembar Jawaban</a></li>
              <li><a href="{{ route('auth.test.input') }}">Input Jawaban</a></li>
              <li><a href="{{ route('auth.test.output') }}">Data Hasil Input Jawaban</a></li>
            </ul>
          </li>
        @endif
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'psychologist' || Auth::user()->role == 'operator')
          <li><a><i class="fa fa-file"></i> Input Hasil Tes <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('auth.inputResultTest.ist.index') }}">IST</a></li>
              <li><a href="{{ route('auth.inputResultTest.16pf.index') }}">16PF</a></li>
              <li><a href="{{ route('auth.inputResultTest.disc.index') }}">DISC</a></li>
              <li><a href="{{ route('auth.inputResultTest.vKraepelin.index') }}">V-Kraepelin</a></li>
            </ul>
          </li>
        @endif
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'psychologist' || Auth::user()->role == 'company' || Auth::user()->role == 'operator')
          <li><a><i class="fa fa-bar-chart-o"></i> Report <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('auth.report.result.index') }}">Hasil Tes</a></li>
            </ul>
          </li>
        @endif
      </ul>
    </div>
</div>