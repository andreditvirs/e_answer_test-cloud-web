<?php

namespace App\Http\Controllers\Auth;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('auth.company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company_types = ['PERSEORANGAN', 'CV', 'PT', 'KOPERASI', 'FIRMA', 'PERSERO', 'LAINNYA'];
        return view('auth.company.create', compact('company_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Company::create([
            "name" => $request->name,
            "address" => $request->address,
            "type" => $request->type,
            "note" => $request->note
        ]);
        return redirect()->route('auth.company.index')->with('success', 'Anda berhasil menambah data '.$request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('auth.company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company_types = ['PERSEORANGAN', 'CV', 'PT', 'KOPERASI', 'FIRMA', 'PERSERO', 'LAINNYA'];
        $company = Company::find($id);
        return view('auth.company.edit', compact('company', 'company_types'));
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
        $company = Company::find($id);
        $company->update([
            "name" => $request->name,
            "address" => $request->address,
            "type" => $request->type,
            "note" => $request->note
        ]);
        return redirect()->route('auth.company.index')->with('success', 'Anda berhasil mengupdate data '.$company->name);
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
