<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Curso;
use App\Models\Professor;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{

    public function createForm()
    {
        
        
        $dadosProfessor = Professor::pluck('id', 'nome', 'endereco', 'email', 'telefone', 'idade', 'sexo'); // Substitua 'campo_descricao' e 'id' pelos campos reais da sua tabela

        return view('cursos.cursos', compact('dadosProfessor'));
    }

    public function pesquisar(Request $request)
    {
        $campoPesquisar = $request->input('termo_pesquisa');
        
        if($campoPesquisar == ''){
            $dadosUsuarios = Curso::leftjoin('professores', 'cursos.professor_id', '=', 'professores.id')
            ->select('cursos.*', 'professores.nome as professor_nome')
            ->get();
        }else{
            $dadosUsuarios = Curso::leftjoin('professores', 'cursos.professor_id', '=', 'professores.id')
            ->Where('cursos.nome','LIKE','%'.$campoPesquisar.'%')
            ->select('cursos.*', 'professores.nome as professor_nome')
            ->get();
         
        }

        return response()->json($dadosUsuarios);
    }

    public function index(){
        return view('cursos.cursos');
    }


    public function show()
    {
      
        $dadosUsuarios = Curso::leftjoin('professores', 'cursos.professor_id', '=', 'professores.id')
        ->select('cursos.*', 'professores.nome as professor_nome')
        ->get();
            
        return response()->json($dadosUsuarios);
      
    }

    public function create(): View
    {
        return view('cursos.create');
    }
 
    public function store(Request $request){

        $comandoSql = $request->all();
        $curso = Curso::create($comandoSql);

        return response()->json($curso);
    }

    public function edit($id)
    {
        //$curso = Curso::find($id);
        //return response()->json($curso);

         $dadosCurso = Curso::leftjoin('professores', 'cursos.professor_id', '=', 'professores.id')
        ->select('cursos.*', 'professores.nome as professor_nome')
        ->Where('cursos.id', '=' ,$id)
        ->get();
            
        return response()->json($dadosCurso);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());
        return response()->json($curso);
    }

    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();

        return response()->json(['success' => true]);
    }


}
