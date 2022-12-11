@extends('auth.layouts.master')
@section('title')
  Ujian
@endsection
@section('ext-style')
<style>
  .selected{
    border: 2px solid green;
  }
  .selected .fa.fa-check{
    color: green;
  }
</style>
@endsection
@section('content')
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Ujian <small> input jawaban</small> </h3>
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
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Input Jawaban Baru</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
            @if(session()->has('success'))
              <div class="alert alert-success">
                  <p class="text-left m-0">{{ session()->get('success') }}</p>
              </div>
            @endif
          </div>
          <div class="x_content">
            @if(!is_null($test_identity_temp))
              <div class="container">
                <div class="row">
                  <div class="bs-example w-100" data-example-id="simple-jumbotron">
                    <div class="jumbotron text-center">
                      <h1>Mohon maaf!</h1>
                      <p>Anda masih memiliki input yang sedang berjalan! <br>Dengan No Test: <b>{{ $test_identity_temp->num_test }}</b></p>
                      <div class="row">
                        <div class="col">
                          <a class="btn btn-primary text-white" href={{ route('auth.test.input.answers') }} style="cursor: pointer">Siap! Saya lanjutkan sesi test sebelumnya</a>
                          <a class="btn btn-danger text-white" href={{ route('auth.test.delete.temp') }} style="cursor: pointer">Hapus dan Buka Input baru!</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @else
              <form method="POST">
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">Pilih Perusahaan <span class="required text-danger">*</span></label>
                  <div class="col-md-9 col-sm-12">
                    <select id="select2-companies" class="w-100" name="companies_id">
                      <option value="" selected disabled>--- PILIH PERUSAHAAN ---</option>
                      @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">Nama Peserta <span class="required text-danger">*</span></label>
                  <div class="col-md-9 col-sm-12">
                    <select id="select2-users-name" class="w-100" name="users_id" disabled>
                      <option value="" selected disabled>--- PILIH NAMA PESERTA ---</option>
                      @foreach ($users as $users)
                        <option value="{{ $users->id }}">{{ $users->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">No Peserta <span class="required text-danger">*</span></label>
                  <div class="col-md-9 col-sm-12">
                    <input type="text" id="num-test" required="required" class="form-control" name="num_test" disabled>
                  </div>
                </div>
                <div class="row">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">Lembar Jawaban <span class="required text-danger">*</span></label>
                  <div class="col-md-9 col-sm-12">
                    <input type="hidden" id="tests" required class="form-control" name="tests_id">
                    @foreach ($tests as $test)
                      <div class="col-md-55">
                          <div class="thumbnail" onclick="$('#tests').val('{{ $test->id }}')">
                          <div class="image view view-first">
                              <img style="width: 100%; display: block;" src="{{ asset($test->url_image) }}" alt="image" />
                              <div class="mask">
                              <p>{{ $test->type }}</p>
                              <div class="tools tools-bottom">
                                  <a href="#"><i class="fa fa-check"></i></a>
                              </div>
                              </div>
                          </div>
                          <div class="caption">
                              <p>{{ $test->name }}</p>
                          </div>
                          </div>
                      </div>
                    @endforeach              
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align">Tanggal Tes <span class="required text-danger">*</span>
                  </label>
                  <div class="col-md-9 col-sm-12 ">
                    <input id="date" name="date" value="{{ date('Y-m-d') }}" class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" required onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
                    <script>
                      function timeFunctionLong(input) {
                        setTimeout(function() {
                          input.type = 'text';
                        }, 60000);
                      }
                    </script>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">Tester </label>
                  <div class="col-md-9 col-sm-12">
                    <select id="select2-testers" class="w-100" name="testers_id">
                      <option value="" selected disabled>--- PILIH PSIKOLOG TESTER ---</option>
                      @foreach ($testers as $tester)
                        <option value="{{ $tester->id }}">{{ $tester->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-9">
                    <button id="btnSubmit" type="submit" class="btn btn-success w-100">Submit</button>
                  </div>
                </div>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
@section('ext-script')
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

        $('form').submit(function(e){
          e.preventDefault();
          $.ajax({
            url: '{{ route("auth.test.store.to.temp") }}',
            type: 'POST',
            dataType: 'json',
            data: {
              '_token': '{{ csrf_token() }}',
              'companies_id': $("[name='companies_id']").val(),
              'users_id': $("[name='users_id']").val(),
              'num_test': $("[name='num_test']").val(),
              'tests_id': $("[name='tests_id']").val(),
              'date': $("[name='date']").val(),
              'testers_id': $("[name='testers_id']").val()
            },
            success: function(d, status){
              window.location.href = d.redirect;
            },
            error: function(e, status, msg){
              console.log(e);
            }
          });
        });
      });
    });
</script>
@endsection