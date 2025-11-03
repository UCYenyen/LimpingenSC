<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'desription',
        'image_url',
        'user_id',
    ];
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
