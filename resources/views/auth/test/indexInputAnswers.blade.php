@extends('auth.layouts.master')
@section('title')
  Ujian
@endsection
@section('ext-style')
  <link href="{{ asset('v1/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
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

    <script>
      function storeAnswerToTemp(id, type){
        let value;
        if(type == 'r') // radio button
        {
          value = $(`input[name='${id}']:checked`).val();
        }else{
          value = $(`input[name='${id}']`).val();
        }
        $.ajax({
          url: '{{ route("auth.test.input.answer.to.temp") }}',
          type: 'POST',
          dataType: 'json',
          data: {
            '_token': '{{ csrf_token() }}',
            'questions_id': id,
            'answer': value
          },
          success: function(d, status){
            // console.log(d);
          },
          error: function(e, status, msg){
            // console.log(e);
          }
        });
      }
    </script>
    @if ($test->type == 'IST')
      @include('auth.components.tests.ist', ["test_identity" => $test_identity_temp, "update" => false, "view" => false])
    @elseif ($test->type == 'KRAEPELIN')
      @include('auth.components.tests.kraepelin', ["test_identity" => $test_identity_temp, "update" => false, "view" => false])
    @endif
</div>
@endsection
@section('ext-script')
<script src="{{ asset('v1/vendors/iCheck/icheck.min.js') }}"></script>
<script>
  $(document).ready(function() {
  });
</script>
@endsection