<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'board_id',
        'user_id'
    ];

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function publisher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
