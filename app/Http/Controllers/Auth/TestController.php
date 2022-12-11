<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\AnswerTemp;
use App\Models\Company;
use App\Models\Test;
use App\Models\TestIdentity;
use App\Models\TestIdentityTemp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function indexList()
    {
        $tests = Test::all();
        return view('auth.test.indexList', compact('tests'));
    }

    public function indexInput()
    {
        $tests = Test::all();
        $users = User::where('role', 'user')->get();
        $testers = User::where('role', 'psychologist')->get();
        $companies = Company::all();
        $test_identity_temp = TestIdentityTemp::where('stored_by', Auth::user()->id)->first();
        return view('auth.test.indexInput', compact('tests', 'users', 'companies', 'testers', 'test_identity_temp'));
    }

    public function indexOutput()
    {
        $test_identities = TestIdentity::all();
        return view('auth.test.indexOutput', compact('test_identities'));
    }

    public function indexInputAnswers()
    {
        $test_identity_temp = TestIdentityTemp::where('stored_by', Auth::user()->id)->first();
        $user = User::where('id', $test_identity_temp->users_id)->first(); // nama peserta
        $test = Test::where('id', $test_identity_temp->tests_id)->first();

        $questions = DB::table('tests')
            ->select("tests.*", "questions.id AS questions_id", "questions.number", "questions.row_number", "questions.col_number", "questions.text", "questions.options", "questions.type", "questions.answer_key", "answers_temp.answer")
            ->join('test_identities_temp', 'tests.id', 'test_identities_temp.tests_id')
            ->rightJoin('questions', 'tests.id', 'questions.tests_id')
            ->leftJoin('answers_temp', 'questions.id', 'answers_temp.questions_id')
            ->where('test_identities_temp.id', $test_identity_temp->id)
            ->orderBy('number', 'ASC')
            ->get();
        return view('auth.test.indexInputAnswers', compact('user', 'test', 'test_identity_temp', 'questions'));
    }

    public function indexOutputAnswers(Request $request)
    {
        $test_identity = TestIdentity::find($request->id);
        $user = User::where('id', $test_identity->users_id)->first(); // nama peserta
        $test = Test::where('id', $test_identity->tests_id)->first();
        $view = true;
        $update = true;

        $questions = DB::table('tests')
            ->select("tests.*", "questions.id AS questions_id", "questions.number", "questions.row_number", "questions.col_number", "questions.text", "questions.options", "questions.type", "questions.answer_key", "answers.answer")
            ->join('test_identities', 'tests.id', 'test_identities.tests_id')
            ->rightJoin('questions', 'tests.id', 'questions.tests_id')
            ->leftJoin('answers', 'questions.id', 'answers.questions_id')
            ->where('test_identities.id', $test_identity->id)
            ->orderBy('number', 'ASC')
            ->get();
        return view('auth.test.indexOutputAnswers', compact('user', 'test', 'test_identity', 'questions', 'view', 'update'));
    }

    public function editOutputAnswers(Request $request)
    {
        $test_identity = TestIdentity::find($request->id);
        $user = User::where('id', $test_identity->users_id)->first(); // nama peserta
        $test = Test::where('id', $test_identity->tests_id)->first();
        $view = false;
        $update = true; // update or input

        $questions = DB::table('tests')
            ->select("tests.*", "questions.id AS questions_id", "questions.number", "questions.row_number", "questions.col_number", "questions.text", "questions.options", "questions.type", "questions.answer_key", "answers.answer")
            ->join('test_identities', 'tests.id', 'test_identities.tests_id')
            ->rightJoin('questions', 'tests.id', 'questions.tests_id')
            ->leftJoin('answers', 'questions.id', 'answers.questions_id')
            ->where('test_identities.id', $test_identity->id)
            ->orderBy('number', 'ASC')
            ->get();
        return view('auth.test.indexOutputAnswers', compact('user', 'test', 'test_identity', 'questions', 'view', 'update'));
    }

    public function storeInputToTemp(Request $request)
    {
        $test_identities = array(
            "users_id" => $request->users_id,
            "num_test" => $request->num_test,
            "tests_id" => $request->tests_id,
            "date" => $request->date,
            "testers_id" => $request->testers_id,
            "stored_by" => Auth::user()->id
        );
        TestIdentityTemp::create($test_identities);
        return json_encode(array(
            "status" => 200,
            "data" => null,
            "redirect" => route('auth.test.input.answers')));
    }

    public function storeAnswerToTemp(Request $request)
    {
        $test_identity_temp_id = TestIdentityTemp::where('stored_by', Auth::user()->id)->first()->id;
        $answer_temp = AnswerTemp::where('test_identities_id', $test_identity_temp_id)->where('questions_id', $request->questions_id)->first();
        $data = array(
            "test_identities_id" => $test_identity_temp_id,
            "questions_id" => $request->questions_id,
            "answer" => $request->answer,
            "stored_by" => Auth::user()->id
        );
        if($answer_temp){
            $answer_temp->update($data);
        }else{
            AnswerTemp::create($data);
        }
        return json_encode(array(
            "status" => 200,
            "data" => null,
            ));
    }

    public function storeInputToDatabase(Request $request)
    {
        $test_identities = TestIdentityTemp::where('stored_by', Auth::user()->id)->first();
        $user = User::where('id', $test_identities->users_id)->first(); // nama peserta
        $test = Test::where('id', $test_identities->tests_id)->first();

        $new_test_identities = new TestIdentity;
        $new_test_identities->users_id = $user->id;
        $new_test_identities->tests_id = $test->id;
        $new_test_identities->testers_id = $test_identities->testers_id;
        $new_test_identities->num_test = $test_identities->num_test;
        $new_test_identities->date = $test_identities->date;
        $new_test_identities->save();
        
        if($test->type == 'IST'){
            foreach($test->questions as $question){
                $answer = new Answer;
                $answer->test_identities_id = $new_test_identities->id;
                $answer->questions_id = $question->id;
                $answer->answer = $request->{$question->id};
                $answer->save();
            }
        }

        $this->destroyInputInTemp();
        return redirect()->route('auth.test.input')->with('success', 'Anda telah berhasil input jawaban untuk '.$user->name);
    }

    public function updateInputToDatabase(Request $request)
    {
        $test_identities = TestIdentity::find($request->id);
        $user = User::where('id', $test_identities->users_id)->first(); // nama peserta
        $test = Test::where('id', $test_identities->tests_id)->first();
        
        // delete all past answer
        $answers = Answer::where('test_identities_id', $test_identities->id);
        $answers->delete();
        
        if($test->type == 'IST'){
            foreach($test->questions as $question){
                $answer = new Answer;
                $answer->test_identities_id = $test_identities->id;
                $answer->questions_id = $question->id;
                $answer->answer = $request->{$question->id};
                $answer->save();
            }
        }
        return redirect()->route('auth.test.output')->with('success', 'Anda telah berhasil update jawaban untuk '.$user->name);
    }

    public function destroyInputInTemp()
    {
        TestIdentityTemp::where('stored_by', Auth::user()->id)->delete();
        AnswerTemp::where('stored_by', Auth::user()->id)->delete();
        return redirect()->route('auth.test.input');
    }

    public function destroyOutputInDatabase(Request $request)
    {
        $test_identity = TestIdentity::find($request->id);
        $answers = Answer::where('test_identities_id', $test_identity->id);
        $test_identity->delete();
        $answers->delete();
        return redirect()->route('auth.test.output');
    }
}
