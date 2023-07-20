<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;

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

    public function demande_table(){
        $table_demande = User::where('confirmed' , '0')->get();
        return view('admin.tables.table_demande')->with('table_demande' , $table_demande);
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
        if(auth()->user()->id !== $enseignement->id){
            return redirect()->back();
        }else{
            return view('prof.show')->with('enseignement' ,$enseignement);     
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
       
        $decryptedId = $request->block;
        $block = User::find($decryptedId);
    
        if ($block) {
            $block->update([
                'block' => '1',
            ]);
    
            return redirect()->back()->with('success', 'User blocked successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
