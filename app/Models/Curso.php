<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';
    protected $primaryKey = 'id';
    protected $fillable = [
         'nome',
         'periodo',
         'professor_id'
     ]; 

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    use HasFactory;
}
