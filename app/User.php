<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

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
     * @abstract 定义用户对咖啡店的喜爱关注关系
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function likes(){
        return $this->belongsToMany(User::class,'users_cafes_likes','cafe_id','user_id');
    }
}
