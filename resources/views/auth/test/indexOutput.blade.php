@extends('auth.layouts.master')
@section('title')
  Ujian
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
        <h3> Hasil <small> input jawaban</small> </h3>
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
            <h2>Hasil Input jawaban</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                      Output dari input jawaban
                    </p>
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No Tes</th>
                          <th>Nama Tes</th>
                          <th>Tanggal Tes</th>
                          <th>Nama Peserta</th>
                          <th>Nama Perusahaan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($test_identities as $test_identity)
                          <tr>
                            <td>{{ $test_identity->num_test }}</td>
                            <td>{{ $test_identity->test->name." (".$test_identity->test->type.")" }}</td>
                            <td>{{ $test_identity->date }}</td>
                            <td>{{ $test_identity->user->name }}</td>
                            <td>{{ $test_identity->user->company->name }}</td>
                            <td>
                              <a type="submit" class="btn btn-sm btn-warning">Export Psikogram</a>
                              <a target="_blank" class="btn btn-sm btn-secondary" href="{{ route('auth.test.output.answers', ["id" => $test_identity->id]) }}">Lihat</a>
                              <a target="_blank" class="btn btn-sm btn-primary" href="{{ route('auth.test.output.answers.edit', ["id" => $test_identity->id]) }}">Edit</a>
                              <form name="deleteForm" action="{{ route('auth.test.output.answers.delete') }}" method="POST" style="display: inline;">
                                @csrf
                                <input name="id" value="{{ $test_identity->id }}" required type="hidden"/>
                                <button type="submit" class="btn btn-sm btn-danger" onclick="deleteForm.submit()">Hapus</button>
                              </form>
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
<script>
// In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('#select2-companies').select2();
      $('#select2-users-name').select2();
      $('#select2-testers').select2();
      $('#select2-companies').on('change', function(){
        $('#select2-users-name').prop('disabled', false);
        $('#num-test').prop('disabled', false);
      });

      $(".thumbnail").on('click', function(){
        $(".thumbnail").removeClass('selected');
        $(this).addClass('selected');
      });

      $("#btnSubmit").on('click', function(){
        if($("[name='companies_id']").val() == null){
          $("[name='companies_id']").focus();
          alert('Nama Perusahaan belum terpilih');
          return;
        }
        if($("[name='users_id']").val() == null){
          $("[name='users_id']").focus();
          alert('Nama Peserta belum terpilih');
          return;
        }
        if($("[name='num_test']").val() == ''){
          $("[name='num_test']").focus();
          alert('No Peserta belum dimasukkan');
          return;
        }
        if($("[name='tests_id']").val() == ''){
          $("[name='tests_id']").focus();
          alert('Jenis Tes belum terpilih');
          return;
        }
        if($("[name='date']").val() == ''){
          $("[name='date']").focus();
          alert('Tanggal Tes belum dimasukkan');
          return;
        }
        $('form').submit();
      });
  });
</script>
@endsection