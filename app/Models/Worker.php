<?php

namespace App\Models;

class Worker extends User
{
    protected $table = 'users';

    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
