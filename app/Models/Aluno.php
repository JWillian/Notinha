<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
   protected $table = 'alunos';
   protected $primaryKey = 'id';
   protected $fillable = [
        'nome',
        'endereco',
        'email',
        'telefone',
        'idade',
        'sexo',
        'curso_id',
        'user_id',
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function curso()
    {
        return $this->belongsToMany(Curso::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    use HasFactory;
}
