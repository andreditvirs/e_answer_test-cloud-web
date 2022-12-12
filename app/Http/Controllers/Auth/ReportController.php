<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\TestResult16pf;
use App\Models\TestResultDisc;
use App\Models\TestResultIst;
use App\Models\TestResultVkraepelin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ReportController extends Controller
{
    public function indexResult(Request $request)
    {
        $users = null;
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'psychologist' || Auth::user()->role == 'operator'){
            $users = User::where('role', 'user')->orderBy('name', 'ASC')->get();
        }else if(Auth::user()->role == 'company'){
            $users = User::where('role', 'user')->where('companies_id', Auth::user()->companies_id)->orderBy('name', 'ASC')->get();
        }
        foreach($users as $user){
            $ist = TestResultIst::where('users_id', $user->id)->orderBy('created_at', 'DESC')->first();
            if($ist){
                $user->ist = $ist->id;
            }
            $_16pf = TestResult16pf::where('users_id', $user->id)->orderBy('created_at', 'DESC')->first();
            if($_16pf){
                $user->_16pf = $_16pf->id;
            }
            $disc = TestResultDisc::where('users_id', $user->id)->orderBy('created_at', 'DESC')->first();
            if($disc){
                $user->disc = $disc->id;
            }
            $vKraepelin = TestResultVkraepelin::where('users_id', $user->id)->orderBy('created_at', 'DESC')->first();
            if($vKraepelin){
                $user->vKraepelin = $vKraepelin->id;
            }
        }
        return view('auth.report.result.index', compact('users'));
    }

    public function createPdf($id) {
        $user = User::find($id);
        $ist = TestResultIst::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        $_16pf = TestResult16pf::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        $disc = TestResultDisc::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        $vKraepelin = TestResultVkraepelin::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        
        $data["user"] = $user;
        $data["ist"] = $ist;
        $data["_16pf"] = $_16pf;
        $data["disc"] = $disc;
        $data["vKraepelin"] = $vKraepelin;
        
        $ex200 = rand(0, 200);
        $ex100 = rand(0, 100);
        $ex100_2 = rand(80, 100);
        $ex100_3 = rand(90, 100);
        $ex10 = rand(0, 10);

        $pdf = PDF::loadView('auth.report.result.pdf', ["data" => $data
            , 'ex200' => $ex200
            , 'ex100' => $ex100
            , 'ex100_2' => $ex100_2
            , 'ex100_3' => $ex100_3
            , 'ex10' => $ex10]);
        
        return $pdf->download($user->name.'.pdf');
    }

    public function viewPdf($id) {
        $user = User::find($id);
        $ist = TestResultIst::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        $_16pf = TestResult16pf::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        $disc = TestResultDisc::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        $vKraepelin = TestResultVkraepelin::where('users_id', $id)->orderBy('created_at', 'DESC')->first();
        
        $data["user"] = $user;
        $data["ist"] = $ist;
        $data["_16pf"] = $_16pf;
        $data["disc"] = $disc;
        $data["vKraepelin"] = $vKraepelin;
        
        $ex200 = rand(0, 200);
        $ex100 = rand(0, 100);
        $ex100_2 = rand(80, 100);
        $ex100_3 = rand(90, 100);
        $ex10 = rand(0, 10);
        
        return view('auth.report.result.pdf', ["data" => $data
        , 'ex200' => $ex200
        , 'ex100' => $ex100
        , 'ex100_2' => $ex100_2
        , 'ex100_3' => $ex100_3
        , 'ex10' => $ex10]);
    }
}
