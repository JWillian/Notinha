<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Aluno;
use App\Models\Professor;
use App\Models\Curso;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;



class AlunoController extends Controller
{
 
    public function createForm()
    {
        
        $dadosCurso = Curso::pluck('id', 'nome', 'periodo', 'professor_id'); // Substitua 'campo_descricao' e 'id' pelos campos reais da sua tabela
        $user_id = Auth::user()->id;

        return view('home.layout', compact('dadosCurso','user_id'));
    }

    public function processForm(Request $request)
    {
        // Lógica para processar os dados do formulário aqui
        // $request->input('campo_selecionado') conterá o valor selecionado no campo select
    }


    public function index()
    {
        $user = Auth::user();
        $userId  = $user->id;
     
        $dadosUsuarios = Aluno::leftjoin('cursos', 'alunos.curso_id', '=', 'cursos.id')
        ->leftJoin('professores', 'cursos.professor_id', '=', 'professores.id')
        ->select('alunos.*', 'cursos.nome as curso_nome', 'professores.nome as professor_nome')
        ->leftJoin('users', 'alunos.user_id', '=', 'users.id')
        ->Where('alunos.user_id', '=' ,$userId)
        ->get();


        return response()->json($dadosUsuarios);
        
    }
 
    public function create(): View
    {
        return view('alunos.create');
    }
  
    public function store(Request $request){
        $comandoSql = $request->all();
        $alunos = Aluno::create($comandoSql);

        return response()->json($alunos);
    }
    
    public function show(string $id)
    {
        $alunos = Aluno::find($id);
        //return view('alunos.show')->with('alunos', $alunos);
        
        return response()->json($alunos);
    }
    
    public function edit(string $id)
    {
        $alunos = Aluno::find($id);
        return response()->json($alunos);
    }
    
    public function update(Request $request, string $id)
    {
        $alunos = Aluno::find($id);
        $comandoSql = $request->all();
        $alunos->update($comandoSql);
        //return redirect('alunos')->with('Resultado', 'Aluno Atualizado!');  

        return response()->json($alunos);
    }
    
    public function destroy(string $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->delete();

        return response()->json(['Resultado' => 'Aluno excluido!']);
    }

}
