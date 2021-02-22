<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //El filleable te permite rellenar estos datos de forma masiva al mismo tiempo por muchos usuarios a la vez.
    //Si lo comentas solo puedes hacer una conexion al mismo tiempo.
    protected $fillable = [
        'role',
        'name',
        'surname',
        'email',
        'password',
        'image',
        'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function videos()
    {   //1-N
        return $this->hasMany('App\Models\Video');
    }

    public function comentarios()
    {    //1-N
        return $this->hasMany('App\Models\Comentario');
    }    

}