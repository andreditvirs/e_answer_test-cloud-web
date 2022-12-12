@extends('auth.layouts.master')
@section('title')
  Result
@endsection
@section('ext-style')
  <link href="{{ asset('v1/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('v1/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('v1/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('v1/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('v1/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Data <small> input hasil tes</small> </h3>
      </div>
      <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
          <div class="x_title">
            <h2>Data hasil tes</h2>
            <ul class="nav navbar-right panel_toolbox">
            </ul>
            <div class="clearfix"></div>
            @if(session()->has('success'))
              <div class="alert alert-success">
                  <p class="text-left m-0">{{ session()->get('success') }}</p>
              </div>
            @endif
          </div>
          <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Jika terdapat input lebih dari satu, sistem akan mengambil hasil tes terakhir
                    </p>
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th rowspan="2">Nama Peserta</th>
                          <th rowspan="2">Nama Perusahaan</th>
                          <th colspan="4">Lihat Ujian</th>
                          <th rowspan="2">Aksi</th>
                        </tr>
                        <tr>
                            <th>IST</th>
                            <th>16PF</th>
                            <th>DISC</th>
                            <th>V-Kraepelin</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->company->name }}</td>
                            <td>
                                @if ($user->ist)
                                    <a target="_blank" class="btn btn-sm btn-secondary" href="{{ route('auth.inputResultTest.ist.show', ["id" => $user->ist]) }}">Lihat</a>
                                @else
                                    -                                
                                @endif
                            </td>
                            <td>
                                @if ($user->_16pf)
                                    <a target="_blank" class="btn btn-sm btn-secondary" href="{{ route('auth.inputResultTest.16pf.show', ["id" => $user->_16pf]) }}">Lihat</a>
                                @else
                                    -                                
                                @endif
                            </td>
                            <td>
                                @if ($user->disc)
                                    <a target="_blank" class="btn btn-sm btn-secondary" href="{{ route('auth.inputResultTest.disc.show', ["id" => $user->disc]) }}">Lihat</a>
                                @else
                                    -                                
                                @endif
                            </td>
                            <td>
                                @if ($user->vKraepelin)
                                    <a target="_blank" class="btn btn-sm btn-secondary" href="{{ route('auth.inputResultTest.vKraepelin.show', ["id" => $user->vKraepelin]) }}">Lihat</a>
                                @else
                                    -                                
                                @endif
                            </td>
                            <td>
                              <a target="_blank" class="btn btn-sm btn-warning" href="{{ route('auth.report.result.pdf.download', ["id" => $user->id]) }}">Lihat Psikogram</a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('ext-script')
  <script src="{{ asset('v1/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
  <script src="{{ asset('v1/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/jszip/dist/jszip.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
  <script src="{{ asset('v1/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
@endsection