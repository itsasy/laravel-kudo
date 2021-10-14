<?php

namespace Database\Seeders;

use App\Models\Board;
use Illuminate\Database\Seeder;

class BoardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Board::factory()->create([
            'title' => 'Joca’s Birthday',
        ]);

        Board::factory()->create([
            'title' => 'OpenOÆce Project'
        ]);

        Board::factory()->create([
            'title' => 'People Team'
        ]);
    }
}
