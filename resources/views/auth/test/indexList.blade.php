@extends('auth.layouts.master')
@section('title')
  Ujian
@endsection
@section('content')
<div class="">
    <div class="page-title">
      <div class="title_left">
        <h3> Ujian <small> jenis lembar jawaban</small> </h3>
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
            <h2>Jenis Lembar Jawaban</h2>
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
                @foreach ($tests as $test)
                    <div class="col-md-55">
                        <div class="thumbnail">
                        <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="{{ asset($test->url_image) }}" alt="image" />
                            <div class="mask">
                            <p>{{ $test->type }}</p>
                            <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a>
                                <a href="#"><i class="fa fa-pencil"></i></a>
                                <a href="#"><i class="fa fa-times"></i></a>
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
        </div>
      </div>
    </div>
</div>
@endsection