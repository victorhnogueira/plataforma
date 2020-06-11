<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialDeApoio extends Model
{
    protected $table = "materiaisdeapoio";

    public function autoruser()
    {
        return $this->belongsTo(User::class, "autor", "id");
    }
}
