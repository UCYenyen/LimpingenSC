<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /** @use HasFactory<\Database\Factories\RequestFactory> */
    use HasFactory;

    protected $fillable = [
        'status',
        'description',
        'user_id',
        'package_id',
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function packages()
    {
        return $this->belongsTo(Package::class);
    }
}
