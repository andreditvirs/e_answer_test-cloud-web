@extends('auth.layouts.master')
@section('title')
  Perusahaan
@endsection
@section('ext-style')
  <link href="{{ asset('v1/vendors/iCheck/skins/flat/green.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Edit <small> perusahaan</small> </h3>
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
            <form method="POST" action={{ route('auth.company.update', ["id" => $company->id]) }}>
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Nama <span class="required text-danger"></span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input name="name" value="{{ $company->name }}" type="text" required="required" class="form-control">
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
                                <input name="address" value="{{ $company->address }}" type="text" required="required" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Tipe<span class="required text-danger"></span>
                            </label>
                            <div class="col-md-9 col-sm-9">
                                <select class="form-control" name="type">
                                @forelse ($company_types as $company_type)
                                    <option value="{{ $company_type }}">{{ $company_type }}</option>
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
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Catatan<span class="required text-danger"></span>
                            </label>
                            <textarea name="note" class="form-control" rows="3" placeholder="Catatan">{{ $company->note }}</textarea>
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