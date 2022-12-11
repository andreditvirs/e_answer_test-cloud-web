@php
    use App\Models\Question;
@endphp
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Input Jawaban <small>by Input Text</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <h3 class="text-center mb-5">LEMBAR JAWABAN KRAEPELIN</h3>
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
                                <input value="{{ date('j M Y', strtotime($test_identity->date)) }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Usia <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ date('Y', strtotime($test_identity->date)) - date('Y', strtotime($user->birthday))." Tahun" }}" type="text" required="required" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align text-left">Nomor tes <span class="required text-danger">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input value="{{ $test_identity->num_test }}" type="text" required="required" class="form-control" readonly>
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
                <style>
                    th,td {
                        /* border: 2px solid black; */
                        height: 48px !important;
                        text-align: center;
                    }

                    td#spanning {
                        border: none;
                        padding: 0px;
                        margin: 0px;
                    }

                    div#col-div-spanning {
                        height: 100%;
                        width: 100%;
                        border: none;
                        padding: 0px;
                        margin: 0px;
                    }

                    div#sub-div-spanning-half {
                        /* border: 2px solid black; */
                        height: 24px;
                        display: flex; align-items: center; justify-content: center;
                        text-align: center;
                    }

                    div#sub-div-spanning {
                        /* border: 2px solid black; */
                        height: 48px;
                        display: flex; align-items: center; justify-content: center;
                        text-align: center;
                    }

                    td#spanning {
                        overflow: hidden;
                        position: relative;
                    }

                    div#col-div-spanning {
                        height: 100%;
                        width: 100%;
                        position: absolute;
                        right: 0;
                        top: 0;
                    }
                </style>
                <style>
                    .container-table {
                        width: 100%;
                        overflow-x: auto;
                    }
                    .container-table b{
                        font-size: 18px;
                    }
                </style>
                <form class="col-md-12 mt-3" method="POST" action="@if ($update) {{ route('auth.test.output.answers.update', ["id" => $test_identity->id]) }} @else {{ route('auth.test.store.to.database') }} @endif">
                    @csrf
                    @php
                        $num = 0;
                    @endphp    
                    <div class="container-table">
                        <table width="500%">
                            <tbody>
                                <tr>
                                    @for ($row = 1; $row <= 50; $row++)
                                        <td>
                                            @php
                                                $questions = Question::where('col_number', $row)->orderBy('number', 'DESC')->get();
                                            @endphp
                                                @include('auth.components.tests.answerForm', ['question' => $questions[0], 'questions' => $questions])
                                        </td>
                                    @endfor
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col">
                            @if(!$view)
                                <button type="submit" class="btn btn-success w-100">Submit</button>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
