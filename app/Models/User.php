<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'
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
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
    public function applicationStatusesParent()
    {
        return $this->hasMany(ApplicationStatus::class,'parent_id');
    }
    public function applicationStatusesChild()
    {
        return $this->hasMany(ApplicationStatus::class,'child_id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
