<div class="row">
    @if($question->type == 'PILGAN')
        <b>{{ $question->number }}) </b>
        @forelse(json_decode($question->options) as $option)
            <div class="col radio m-1 p-0">
                <label>
                    <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" name="{{ $question->questions_id }}" style="position: absolute; opacity: 0;" value="{{ $option }}" @if ($option == $question->answer) checked @endif onclick="storeAnswerToTemp('{{ $question->questions_id }}', 'r')"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> &nbsp;&nbsp;{{ $option }}
                </label>
            </div>
        @empty
        @endforelse  
    @elseif($question->type == 'URAIAN')
        <div class="item form-group">
            <label class="col-form-label col-md-1 col-sm-1 label-align"><b>{{ $question->number }}) </b></label>
            <div class="col-md-11 col-sm-11">
                <input name="{{ $question->questions_id }}" type="text" class="form-control" onchange="storeAnswerToTemp('{{ $question->questions_id }}')" value="{{ $question->answer }}">
            </div>
        </div>
    @elseif($question->type == 'KRAEPELIN')
        <table>
            <thead>
                <tr>
                    <th colspan="1" width="50" style="height: 0px !important;"></th>
                    <th rowspan="2" width="70" style="height: 0px !important;"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><b>{{ json_decode($questions[0]->text)->atas }}</b></td>
                    <td id="spanning" rowspan="{{ count($questions) + 3 }}">
                        <div id="col-div-spanning">
                            <div id="sub-div-spanning-half"></div>
                            @for ($sub = 0; $sub < count($questions); $sub++)
                                <div id="sub-div-spanning">
                                    <input placeholder="" name="{{ $questions[$sub]->id }}" min="0" max="9" type="number" class="form-control" tabindex="{{ $questions[$sub]->number }}">
                                </div>    
                            @endfor
                            <div id="sub-div-spanning-half"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><b>{{ json_decode($questions[0]->text)->bawah }}</b></td>
                </tr>
                @for ($sub = 1; $sub < count($questions); $sub++)
                    <tr>
                        <td><b>{{ json_decode($questions[$sub]->text)->bawah }}</b></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    @endif
</div>