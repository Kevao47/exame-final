<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussao extends Model {
    use HasFactory;
    protected $table = 'discussoes';

    protected $fillable = [
        'titulo',
        'texto',
        'user_id'
    ];

    public function getUrlAttribute() { // Mutator que sera executada quando tentar acessar a propriedade url da model
        return route('show-discussao', ['id' => $this->id]);
    }

    public function getContadorAttribute() { // Mutator que sera executada quando tentar acessar a propriedade contador da model
        return $this->comentarios_count ?? 0;
    }

    // Relaçoes
    public function comentarios() {
        return $this->hasMany(DiscussaoComentario::class, 'discussao_id', 'id')->with('usuario');
    }

    public function dono(){
        return $this->hasOne(Usuario::class, 'id', 'user_id');
    }

    
    public function comentar($texto) {
        return DiscussaoComentario::create([
            'discussao_id' => $this->id,
            'user_id' => auth()->user()->id,
            'texto' => $texto
        ]);
    }
}
