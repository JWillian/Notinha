<?php

use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProfessorController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\GraficosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', function () {
    return view('welcome');
});

Route::get('/graficos', function () {
    return view('graficos.graficos');
});


 // Rotas para usuários normais
 Route::get('/home', [AlunoController::class, 'createForm']);
 Route::post('/home', [AlunoController::class, 'processForm']);
 Route::get('/Aluno', [AlunoController::class, 'index']);
 Route::get('/Aluno/create', [AlunoController::class, 'create']);
 Route::post('/Aluno', [AlunoController::class, 'store']);
 Route::get('/Aluno/edit/{id}', [AlunoController::class, 'edit']);
 Route::put('/Aluno/update/{id}',[AlunoController::class, 'update']);
 Route::delete('/Aluno/{id}', [AlunoController::class, 'destroy']);

 // Rotas para professores
 Route::get('/professores', [ProfessorController::class, 'index']);
 Route::get('/professores/show', [ProfessorController::class, 'show']);
 Route::post('/professores', [ProfessorController::class, 'store']);
 Route::get('/professores/edit/{id}', [ProfessorController::class, 'edit']);
 Route::put('/professores/update/{id}', [ProfessorController::class, 'update']);
 Route::delete('/professores/{id}', [ProfessorController::class, 'destroy']);

 
 // Rotas para cursos
 Route::get('/cursos', [CursoController::class, 'index']);
 Route::get('/cursos/show', [CursoController::class, 'show']);
 Route::post('/cursos', [CursoController::class, 'store']);
 Route::get('/cursos/pesquisar', [CursoController::class, 'pesquisar']);
 Route::get('/cursos', [CursoController::class, 'createForm']);
 Route::get('/cursos/edit/{id}', [CursoController::class, 'edit']);
 Route::put('/cursos/update/{id}', [CursoController::class, 'update']);
 Route::delete('/cursos/{id}', [CursoController::class, 'destroy']);

  // Rotas para gráficos
  Route::get('/graficos', [GraficosController::class, 'index']);

         


