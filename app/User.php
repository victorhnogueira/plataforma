<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function firstName()
    {
        return Str::before($this->name, " ");
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class, "curso_id", "id");
    }

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, "cargo_id", "id");
    }

//    TODO: rever esse relacionamento
//    public function gerenteNosProjetos()
//    {
//        return $this->hasMany(Projeto::class, "gerente_id", "id");
//    }

    public function projetos()
    {
        return $this->belongsToMany(Projeto::class, 'projetos_users','user_id', 'projeto_id')->withPivot('funcao');
    }
}
