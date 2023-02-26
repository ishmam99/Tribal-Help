<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function files()
    {
       return $this->hasMany(ApplicationMedia::class);
    }
    public function comments()
    {
       return $this->hasMany(Comment::class);
    }
    public function statuses()
    {
       return $this->hasMany(ApplicationStatus::class);
    }
}
