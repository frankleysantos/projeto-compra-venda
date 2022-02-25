<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'password',
        'image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function perfil(){
    //     return $this->hasOne(PerfilUsuario::class);
    // }

    public function perfil($user_id) {
        $user = DB::table('users as u')
                    ->join('perfil_usuarios as pf', 'pf.user_id', 'u.id')
                    ->select(
                        'u.name as name', 'u.username as username', 'u.name as name',
                        'pf.user_id as user_id', 'pf.perfil as perfil', 'pf.status as status'
                    )
                    ->where('u.id',$user_id)
                    ->first();
  
        return $user;
    }
}
