<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationStatus extends Model
{
    use HasFactory;
    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
    public function parent()
    {
        return $this->belongsTo(User::class,'parent_id');
    }
    public function child()
    {
        return $this->belongsTo(User::class,'child_id');
    }
}
