<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\TestResult16pf;
use App\Models\TestResultDisc;
use App\Models\TestResultIst;
use App\Models\TestResultVkraepelin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\TestResult;

class InputTestResultController extends Controller
{
    public function indexIst(Request $request)
    {
        $results = TestResultIst::all();
        return view('auth.inputTestResult.ist.index', compact('results'));
    }

    public function createIst(Request $request)
    {
        $users = User::where('role', 'user')->get();
        $testers = User::where('role', 'psychologist')->get();
        $companies = Company::all();
        return view('auth.inputTestResult.ist.create', compact('users', 'testers', 'companies'));
    }

    public function showIst(Request $request, $id)
    {
        $result = TestResultIst::find($id);
        return view('auth.inputTestResult.ist.show', compact('result'));
    }

    public function deleteIst(Request $request)
    {
        $result = TestResultIst::find($request->id);
        $result->delete();
        return redirect()->route('auth.inputResultTest.ist.index')->with('success', "Anda sudah berhasil menghapus data dengan nomor tes: ". $result->num_test);
    }

    public function storeIst(Request $request)
    {
        TestResultIst::create($request->all());
        return redirect()->route('auth.inputResultTest.ist.index')->with('success', "Anda sudah berhasil input dengan nomor tes: ". $request->num_test);
    }

    public function index16pf(Request $request)
    {
        $results = TestResult16pf::all();
        return view('auth.inputTestResult.16pf.index', compact('results'));
    }

    public function create16pf(Request $request)
    {
        $users = User::where('role', 'user')->get();
        $testers = User::where('role', 'psychologist')->get();
        $companies = Company::all();
        return view('auth.inputTestResult.16pf.create', compact('users', 'testers', 'companies'));
    }

    public function show16pf(Request $request, $id)
    {
        $result = TestResult16pf::find($id);
        return view('auth.inputTestResult.16pf.show', compact('result'));
    }

    public function delete16pf(Request $request)
    {
        $result = TestResult16pf::find($request->id);
        $result->delete();
        return redirect()->route('auth.inputResultTest.16pf.index')->with('success', "Anda sudah berhasil menghapus data dengan nomor tes: ". $result->num_test);
    }

    public function store16pf(Request $request)
    {
        $answer = null;
        for ($num = 1; $num <= 187; $num++){
            $answer[$num] = $request->{$num};
        }
        $answer = json_encode($answer);
        $new_test = new TestResult16pf;
        $new_test->users_id = $request->users_id;
        $new_test->testers_id = $request->testers_id;
        $new_test->num_test = $request->num_test;
        $new_test->answer = $answer;
        $new_test->date = $request->date;
        $new_test->stored_by = Auth::user()->id;
        $new_test->save();
        return redirect()->route('auth.inputResultTest.16pf.index')->with('success', "Anda sudah berhasil input". $request->num_test);
    }

    public function indexDisc(Request $request)
    {
        $results = TestResultDisc::all();
        return view('auth.inputTestResult.disc.index', compact('results'));
    }

    public function createDisc(Request $request)
    {
        $users = User::where('role', 'user')->get();
        $testers = User::where('role', 'psychologist')->get();
        $companies = Company::all();
        return view('auth.inputTestResult.disc.create', compact('users', 'testers', 'companies'));
    }

    public function showDisc(Request $request, $id)
    {
        $result = TestResultDisc::find($id);
        return view('auth.inputTestResult.disc.show', compact('result'));
    }

    public function deleteDisc(Request $request)
    {
        $result = TestResultDisc::find($request->id);
        $result->delete();
        return redirect()->route('auth.inputResultTest.disc.index')->with('success', "Anda sudah berhasil menghapus data dengan nomor tes: ". $result->num_test);
    }

    public function storeDisc(Request $request)
    {
        $answer = null;
        for ($num = 1; $num <= 62; $num++){
            if($num > 38){
                $answer["S-".$num] = $request->{"S-".$num};
                $answer["T-".$num] = $request->{"T-".$num};
            }else{
                $answer["M-".$num] = $request->{"M-".$num};
                $answer["L-".$num] = $request->{"L-".$num};
            }
        }
        $answer = json_encode($answer);
        $new_test = new TestResultDisc;
        $new_test->users_id = $request->users_id;
        $new_test->testers_id = $request->testers_id;
        $new_test->num_test = $request->num_test;
        $new_test->answer = $answer;
        $new_test->date = $request->date;
        $new_test->stored_by = Auth::user()->id;
        $new_test->save();
        return redirect()->route('auth.inputResultTest.disc.index')->with('success', "Anda sudah berhasil input". $request->num_test);
    }

    public function indexVKraepelin(Request $request)
    {
        $results = TestResultVkraepelin::all();
        return view('auth.inputTestResult.vKraepelin.index', compact('results'));
    }

    public function createVKraepelin(Request $request)
    {
        $users = User::where('role', 'user')->get();
        $testers = User::where('role', 'psychologist')->get();
        $companies = Company::all();
        return view('auth.inputTestResult.VKraepelin.create', compact('users', 'testers', 'companies'));
    }

    public function showVKraepelin(Request $request, $id)
    {
        $result = TestResultVKraepelin::find($id);
        return view('auth.inputTestResult.VKraepelin.show', compact('result'));
    }

    public function deleteVKraepelin(Request $request)
    {
        $result = TestResultVKraepelin::find($request->id);
        $result->delete();
        return redirect()->route('auth.inputResultTest.vKraepelin.index')->with('success', "Anda sudah berhasil menghapus data dengan nomor tes: ". $result->num_test);
    }

    public function storeVKraepelin(Request $request)
    {
        $answer = null;
        for ($num = 1; $num <= 187; $num++){
            $answer[$num] = $request->{$num};
        }
        $answer = json_encode($answer);
        $new_test = new TestResultVKraepelin;
        $new_test->users_id = $request->users_id;
        $new_test->testers_id = $request->testers_id;
        $new_test->num_test = $request->num_test;
        $new_test->answer = $answer;
        $new_test->date = $request->date;
        $new_test->stored_by = Auth::user()->id;
        $new_test->save();
        return redirect()->route('auth.inputResultTest.vKraepelin.index')->with('success', "Anda sudah berhasil input". $request->num_test);
    }
}
