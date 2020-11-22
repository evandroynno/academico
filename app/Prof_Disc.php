<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Professor;
use App\Disciplina;

class Prof_Disc extends Model
{
	protected $table = 'prof__discs';
	protected $fillable = ['professor_id','disciplina_id','local','semestre'];

	public function professor(){
		return $this->belongsTo(Professor::class);
	}
	public function disciplina(){
		return $this->belongsTo(Disciplina::class);
	}
}
