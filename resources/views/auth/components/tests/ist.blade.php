<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Input Jawaban <small>by Radio Button</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <h3 class="text-center mb-5">LEMBAR JAWABAN IST</h3>
                <div class="row mb-3">
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Nama <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ $user->name }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Tempat, tgl lahir <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ $user->birthplace.", ".date('j M Y', strtotime($user->birthday)) }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Tanggal tes <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ date('j M Y', strtotime($test_identity_temp->date)) }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Usia <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ date('Y', strtotime($test_identity_temp->date)) - date('Y', strtotime($user->birthday))." Tahun" }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Nomor tes <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ $test_identity_temp->num_test }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Jenis Kelamin <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="@if($user->gender == 'LK') {{ 'Laki-laki' }} @else {{ 'Perempuan' }} @endif" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Pendidikan <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ $user->education_level }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Jurusan <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ $user->education_prody }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <form class="col-md-12 mt-3" method="POST" action="{{ route('auth.test.store.to.database') }}">
                    @csrf
                    @php
                        $num = 0;
                    @endphp
                    <div class="form-group row">
                        @for($i = 1; $i <= 4; $i++)
                            @if($i == 1)
                                <div class="col-3">
                                    @for ($j = 0; $j < 20; $j++)
                                        @php
                                            $question = $questions[$j];
                                        @endphp
                                            @include('auth.components.tests.answerForm', ['question' => $question])
                                        @php
                                            $num++;
                                        @endphp
                                    @endfor
                                </div>
                            @elseif($i == 2)
                                <div class="col-3">
                                    @for ($j = 20; $j < 40; $j++)
                                        @php
                                            $question = $questions[$j];
                                        @endphp
                                            @include('auth.components.tests.answerForm', ['question' => $question])
                                        @php
                                            $num++;
                                        @endphp
                                    @endfor
                                </div>
                            @elseif($i == 3)
                                <div class="col-3">
                                    @for ($j = 40; $j < 60; $j++)
                                        @php
                                            $question = $questions[$j];
                                        @endphp
                                            @include('auth.components.tests.answerForm', ['question' => $question])
                                        @php
                                            $num++;
                                        @endphp
                                    @endfor
                                </div>
                            @elseif($i == 4)
                                <div class="col-3">
                                    @for ($j = 60; $j < 76; $j++)
                                        @php
                                            $question = $questions[$j];
                                        @endphp
                                            @include('auth.components.tests.answerForm', ['question' => $question])
                                        @php
                                            $num++;
                                        @endphp
                                    @endfor
                                </div>
                            @endif
                        @endfor
                    </div>
                    <div class="form-group row">
                        @for($i = 1; $i <= 3; $i++)
                            @if($i == 1)
                                <div class="col-4">
                                    @for ($j = 77; $j < 96; $j++)
                                        @php
                                            $question = $questions[$j];
                                        @endphp
                                            @include('auth.components.tests.answerForm', ['question' => $question])
                                        @php
                                            $num++;
                                        @endphp
                                    @endfor
                                </div>
                            @elseif($i == 2)
                                <div class="col-4">
                                    @for ($j = 97; $j < 116; $j++)
                                        @php
                                            $question = $questions[$j];
                                        @endphp
                                            @include('auth.components.tests.answerForm', ['question' => $question])
                                        @php
                                            $num++;
                                        @endphp
                                    @endfor
                                </div>
                            @elseif($i == 3)
                                <div class="col-4">
                                    @for ($j = 117; $j < 136; $j++)
                                        @php
                                            $question = $questions[$j];
                                        @endphp
                                            @include('auth.components.tests.answerForm', ['question' => $question])
                                        @php
                                            $num++;
                                        @endphp
                                    @endfor
                                </div>
                            @endif
                        @endfor
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col">
                            <button type="submit" class="btn btn-success w-100">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
