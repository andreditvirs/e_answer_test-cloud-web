@extends('auth.layouts.master')
@section('title')
  Perusahaan
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
        <h3> Data <small> perusahaan</small> </h3>
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
            <h2>Data Perusahaan</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="btn btn-success text-dark" href="{{ route('auth.company.create') }}">Buat Data Baru</a></li>
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
                      Penghapusan Data Master membutuhkan akses lebih dan izin dari admin database
                    </p>
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Tipe</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($companies as $company)
                          <tr>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->address }}</td>
                            <td>{{ $company->type }}</td>
                            <td>
                              <a target="_blank" class="btn btn-sm btn-secondary" href="{{ route('auth.company.show', ["id" => $company->id]) }}">Lihat</a>
                              <a target="_blank" class="btn btn-sm btn-primary" href="{{ route('auth.company.edit', ["id" => $company->id]) }}">Edit</a>
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