<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $table_prof = User::where('role' , 'prof')->get();
        return view('admin.tables.ensiengement_table')->with('table_prof' , $table_prof);
    }

    public function student_table(){
        $table_student = User::where('role' , 'student')->get();
        return view('admin.tables.student_table')->with('table_student' , $table_student);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $enseignement = User::find($id);
        return view('prof.show')->with('enseignement' ,$enseignement);     
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('prof.edit',compact('user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

    
        $user->update([
            'block' => true,
        ]);
    
        return response()->json(['success' => 'Utilisateur bloqué avec succès']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
