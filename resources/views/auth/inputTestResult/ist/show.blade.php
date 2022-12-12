@extends('auth.layouts.master')
@section('title')
  IST
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
        <h3> Detail <small> data input jawaban IST</small> </h3>
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
            <h2>Detail Data</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <form>
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
                <div class="row mb-2">
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">I se <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->I_se }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">II wa <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->II_wa }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">III an <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->III_an }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">IV ge <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->IV_ge }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="row mb-4">
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">V ra <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->V_ra }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">VI zr <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->VI_zr }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">VII fa <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->VII_fa }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="col">
                    <label class="col-form-label col-md-3 col-sm-12 label-align">VIII wu <span class="required text-danger">*</span>
                    </label>
                      <div class="col-md-9 col-sm-12 ">
                        <input value="{{ $result->VIII_wu }}" type="number" required class="form-control" class="form-control" readonly>
                    </div>
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
@endsection