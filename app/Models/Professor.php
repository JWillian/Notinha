<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{

   protected $table = 'professores';
   protected $primaryKey = 'id';
   protected $fillable = [
        'nome',
        'endereco',
        'email',
        'telefone',
        'idade',
        'sexo'
    ];

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }

    
    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

   
    use HasFactory;
}
