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
        <h3> Edit <small> pengguna</small> </h3>
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
            <form method="POST" action="{{ route('auth.user.update', ["id" => $user->id]) }}">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">UUID <span class="required text-danger"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input name="uuid" value="{{ $user->uuid }}" type="text" required="required" class="form-control" readonly>
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
                                <input name="username" value="{{ $user->username }}" type="text" required="required" class="form-control" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Password <span class="required text-danger"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input name="password" value="" type="password" class="form-control" placeholder="Ketik disini untuk mengganti password user... (Tinggalkan kosong jika tidak ingin mengganti)">
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
                                <input name="name" value="{{ $user->name }}" type="text" required="required" class="form-control" >
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
                            <select class="form-control" required name="role">
                                @forelse ($user_roles as $role)
                                    <option value="{{ $role }}" @if ($role == $user->role) selected @endif>{{ $role }}</option>
                                @empty
                                    
                                @endforelse
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
                            <select  class="form-control" name="gender">
                                <option value="LK" @if ($user->gender == 'LK') selected @endif>Laki - Laki</option>
                                <option value="PR" @if ($user->gender == 'PR') selected @endif>Perempuan</option>
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
                                <input name="position_in_company" value="{{ $user->position_in_company }}" type="text" required="required" class="form-control" >
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
                                <input name="address" value="{{ $user->address }}" type="text" required="required" class="form-control" >
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
                                <input name="birthplace" value="{{ $user->birthplace }}" type="text" required="required" class="col-4 form-control" >
                                <div class="col-8">
                                <div class="item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Tanggal Lahir <span class="required text-danger"></span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 ">
                                        <input name="birthday" value="{{ $user->birthday }}" type="date" required="required" class="form-control" >
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
                                <input name="education_level" value="{{ $user->education_level }}" type="text" required="required" class="form-control" >
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
                                <input name="education_prody" value="{{ $user->education_prody }}" type="text" required="required" class="form-control" >
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
                                <input name="education_institution" value="{{ $user->education_institution }}" type="text" class="form-control" >
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
                                <input name="field" value="{{ $user->field }}" type="text" class="form-control"  placeholder="Seperti: IPA, IPS, dll">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Catatan<span class="required text-danger"></span>
                            </label>
                            <textarea name="note" class="form-control" rows="3" placeholder="Catatan" >{{ $user->note }}</textarea>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success w-100 my-4">Submit</button>
            </form>
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