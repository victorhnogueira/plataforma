<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = "cursos";

    public function membros()
    {
        return $this->hasMany(User::class, "curso_id", "id");
    }
}
