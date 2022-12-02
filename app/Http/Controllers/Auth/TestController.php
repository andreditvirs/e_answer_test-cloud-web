<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function indexAnswerPapers()
    {
        return view('auth.answerPapers.index');
    }
}
