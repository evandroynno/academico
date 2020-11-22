<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyAluno extends Model
{
    protected $guarded = [];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'aluno_matricula', 'matricula');
    }
}
