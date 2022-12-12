@extends('auth.layouts.master')
@section('title')
  V-Kraepelin
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
          </div>
          <div class="x_content">
              <form>
                @csrf
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">Pilih Perusahaan <span class="required text-danger">*</span></label>
                  <div class="col-md-9 col-sm-12">
                    <input type="text" value="{{ $result->user->company->name }}" class="form-control" readonly/>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">Nama Peserta <span class="required text-danger">*</span></label>
                  <div class="col-md-9 col-sm-12">
                    <input type="text" value="{{ $result->user->name }}" class="form-control" readonly/>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align" for="first-name">No Peserta <span class="required text-danger">*</span></label>
                  <div class="col-md-9 col-sm-12">
                    <input type="text" value="{{ $result->num_test }}" class="form-control" readonly/>
                  </div>
                </div>
                <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-12 label-align">Tanggal Tes <span class="required text-danger">*</span>
                  </label>
                  <div class="col-md-9 col-sm-12 ">
                    <input id="date" name="date" value="{{ $result->date }}" class="date-picker form-control" placeholder="dd-mm-yyyy" type="date" required onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" class="form-control" readonly>
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
                    <input type="text" value="@if (!is_null($result->tester)) {{$result->tester->name }} @endif" class="form-control" readonly/>
                  </div>
                </div>
                <hr />
                @php
                  $answer = json_decode($result->answer, true);
                @endphp
                @for ($num = 0; $num < 187; $num++)
                    @if ($num % 5 == 0)
                    <div class="row">
                        @for ($i = 1; $i <= 5; $i++)
                            @if($num + $i > 187)
                                @break;
                            @endif
                            <div class="col">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align text-left">{{ $num + $i }} <span class="required text-danger"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input name="{{ ($num + $i) }}" value="{{ $answer[($num + $i)] }}" type="number" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>        
                    @endif    
                @endfor
                <div class="row">
                  <div class="col">
                  </div>
                </div>
              </form>
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
      $('#select2-testers').select2();
      $('#select2-users-name').select2();
      $('#select2-companies').on('change', function(){
        $.ajax({
          url: '{{ route("auth.user.getUserByCompaniesId") }}',
          type: 'GET',
          dataType: 'json',
          data: {
            '_token': '{{ csrf_token() }}',
            'companies_id': $('#select2-companies').val()
          },
          success: function(d, status){
            $(".new-option-user").remove();
            let text = '';
            for(let i = 0; i < d.length; i++){
              text += `<option class="new-option-user" value="${d[i].id}">${d[i].name}</option>`
            }
            $('#select2-users-name').append(text);
            $('#select2-users-name').select2();
          },
          error: function(e, status, msg){
            console.log(e);
          }
        });
        $('#select2-users-name').prop('disabled', false);
        $('#num-test').prop('disabled', false);
      });

      $(".thumbnail").on('click', function(){
        $(".thumbnail").removeClass('selected');
        $(this).addClass('selected');
      });

      $("#btnSubmit").on('click', function(){
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
      });
    });
</script>
@endsection