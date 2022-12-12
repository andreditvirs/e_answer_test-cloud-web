<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUserByCompaniesId(Request $request)
    {
        $users = User::select('id', 'name')->where('role', 'user')->where('companies_id', $request->companies_id)->get();
        return json_encode($users);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return view('auth.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_roles = ['user', 'operator', 'psychologist', 'admin', 'company'];
        return view('auth.user.create', compact('user_roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            "name" => $request->name,
            "address" => $request->address,
            "type" => $request->type,
            "note" => $request->note
        ]);
        return redirect()->route('auth.User.index')->with('success', 'Anda berhasil menambah data '.$request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('auth.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_roles = ['user', 'operator', 'psychologist', 'admin', 'company'];
        $user = User::find($id);
        return view('auth.user.edit', compact('user', 'user_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($request->password != ''){
            $user->update(["password" => Hash::make($request->password)]);
        }
        $user->update([
            "uuid" => $request->uuid,
            "username" => $request->username,
            "name" => $request->name,
            "role" => $request->role,
            "gender" => $request->gender,
            "position_in_company" => $request->position_in_company,
            "address" => $request->address,
            "birthplace" => $request->birthplace,
            "birthday" => $request->birthday,
            "education_level" => $request->education_level,
            "education_prody" => $request->education_prody,
            "education_institution" => $request->education_institution,
            "field" => $request->field,
            "note" => $request->note
        ]);
        return redirect()->route('auth.user.index')->with('success', 'Anda berhasil mengupdate data '.$user->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
