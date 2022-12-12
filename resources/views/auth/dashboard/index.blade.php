@extends('auth.layouts.master')
@section('title')
  Dashboard
@endsection
@section('content')
<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Dashboard</h3>
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
      @if (Auth::user()->role != 'company')
        <h1>Hi, {{ Auth::user()->name }}</h1>
        <h2>Kamu belum punya input baru nih...</h2>
        <button class="btn btn-success">Buat Input Hasil Tes Baru Sekarang</button>
      @else
        <h1>Hi, {{ Auth::user()->name }}</h1>
        <h2>Kamu belum punya hasil tes baru nih...</h2>
        <button class="btn btn-success">Lihat hasil tes terbaru</button>
      @endif
    </div>
  </div>
</div>
@endsection