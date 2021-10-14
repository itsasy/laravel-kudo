<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'worker_id'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
