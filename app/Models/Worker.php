<?php

namespace App\Models;

class Worker extends User
{
    public function boards()
    {
        return $this->hasMany(Board::class);
    }
}
