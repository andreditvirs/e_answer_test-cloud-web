@extends('auth.layouts.master')
@section('title')
  Pengguna
@endsection
@section('ext-style')
  <link href="{{ asset('v1/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Detail <small> pengguna</small> </h3>
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
    <div class="x_panel">
      <div class="x_content">
        <div class="row mb-3">
          <div class="col">
              <div class="item form-group">
                  <label class="col-form-label col-md-3 col-sm-3 label-align text-left">UUID <span class="required text-danger"></span>
                  </label>
                  <div class="col-md-9 col-sm-9 ">
                      <input value="{{ $user->uuid }}" type="text" required="required" class="form-control" readonly>
                  </div>
              </div>
          </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Username <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->username }}" type="text" required="required" class="form-control" readonly>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Nama Lengkap <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->name }}" type="text" required="required" class="form-control" readonly>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Role User<span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                  <select readonly class="form-control">
                    <option>{{ $user->role }}</option>
                  </select>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Jenis Kelamin<span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                  <select readonly class="form-control">
                    <option>{{ $user->gender }}</option>
                  </select>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Posisi di Perusahaan <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->position_in_company }}" type="text" required="required" class="form-control" readonly>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Alamat <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->address }}" type="text" required="required" class="form-control" readonly>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Tempat Lahir <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                  <div class="row">
                    <input value="{{ $user->birthplace }}" type="text" required="required" class="col-4 form-control" readonly>
                    <div class="col-8">
                      <div class="item form-group">
                          <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Tanggal Lahir <span class="required text-danger"></span>
                          </label>
                          <div class="col-md-9 col-sm-9 ">
                              <input value="{{ $user->birthday }}" type="date" required="required" class="form-control" readonly>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Pendidikan Terakhir <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->education_level }}" type="text" required="required" class="form-control" readonly>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Jurusan Pendidikan Terakhir <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->education_prody }}" type="text" required="required" class="form-control" readonly>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Lembaga Pendidikan Terakhir <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->education_institution }}" type="text" required="required" class="form-control" readonly>
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Bidang Pendidikan Terakhir <span class="required text-danger"></span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input value="{{ $user->field }}" type="text" required="required" class="form-control" readonly placeholder="Seperti: IPA, IPS, dll">
                </div>
            </div>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Catatan<span class="required text-danger"></span>
                </label>
                <textarea class="form-control" rows="3" placeholder="Catatan" readonly>{{ $user->note }}</textarea>
            </div>
        </div>
    </div>
      </div>
    </div>
</div>
@endsection
@section('ext-script')
<script src="{{ asset('v1/vendors/iCheck/icheck.min.js') }}"></script>
<script>
  $(document).ready(function() {
  });
</script>
@endsection