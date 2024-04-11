<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ProfessorController extends Controller
{

      
    public function index()
    {
       $professores = Professor::all();
       //return response()->json($professores);
       return view('professores.index');
      
    }

    public function show()
    {
       $professores = Professor::all();
       return response()->json($professores);
      
    }

    public function create(): View
    {
        return view('professores.create');
    }
 
    public function store(Request $request){
        $comandoSql = $request->all();
        $professores = Professor::create($comandoSql);

        return response()->json($professores);
    }

    public function edit($id)
    {
        $professor = Professor::find($id);
        return response()->json($professor);
    }

    public function update(Request $request, $id)
    { 
        $professor = Professor::findOrFail($id);
        $professor->update($request->all());
        return response()->json([$professor]);
    }

    public function destroy($id)
    {
        $professor = Professor::findOrFail($id);
        $professor->delete();

        return response()->json(['success' => true]);
    }

}
