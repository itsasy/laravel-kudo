<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_boards()
    {
        User::factory()->times(10)->create();
        $boards = Board::factory()->times(10)->create();

        $response = $this->get(route('boards.index'));

        $response->assertJsonFragment([
            'title' => $boards[0]->title,
            'worker_id' => $boards[0]->worker_id
        ])->assertStatus(200);
    }

    /** @test */
    public function create_a_board()
    {
        $user = User::factory()->create();
        $board = Board::factory()->raw();

        $response = $this->post(route('boards.store'), $board);

        $this->assertDatabaseHas('boards', $board);

        $response->assertJson([
            'message' => 'Has been created',
            'board' => [
                'title' => $board['title'],
                'worker_id' => $user->id
            ],
            'code' => 201
        ])->assertStatus(201);
    }

    /** @test */
    public function update_a_board()
    {
        $workers = User::factory()->times(10)->create();
        $boards = Board::factory()->times(10)->create();

        $boardUpdated = [
            'title' => 'Title updated',
            'worker_id' => $workers[5]->id
        ];

        $response = $this->put(route('boards.update', $boards[0]->id), $boardUpdated);

        $response->assertJson([
            'message' => 'Has been updated',
            'board' => [
                'id' => $boards[0]->id,
                'title' => $boardUpdated['title'],
                'worker_id' => $boardUpdated['worker_id']
            ], 'code' => 201

        ])->assertStatus(201);
    }

    /** @test */
    public function delete_a_board()
    {
        User::factory()->times(10)->create();
        $boards = Board::factory()->times(10)->create();

        $response = $this->delete(route('boards.destroy', $boards[0]->id));

        $this->assertSoftDeleted('boards', [
            'id' => $boards[0]->id,
            'worker_id' => $boards[0]->worker_id
        ]);

        $response->assertJson([
            'message' => 'Has been deleted',
            'code' => 200
        ])->assertStatus(200);
    }
}
