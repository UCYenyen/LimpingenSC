<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
