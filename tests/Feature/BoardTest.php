<?php

namespace Tests\Feature;

use App\Models\Board;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_boards()
    {
        $boards = Board::factory()->times(10)->create();

        $response = $this->get(route('boards.index'));

        $response->assertJsonFragment([
            'title' => $boards[0]->title,
        ])->assertStatus(200);
    }

    /** @test */
    public function create_a_board()
    {
        $board = Board::factory()->raw();

        $response = $this->post(route('boards.store'), $board);

        $this->assertDatabaseHas('boards', $board);

        $response->assertJson([
            'message' => 'Has been created',
            'board' => [
                'title' => $board['title'],
            ],
            'code' => 201
        ])->assertStatus(201);
    }

    /** @test */
    public function update_a_board()
    {
        $boards = Board::factory()->times(10)->create();

        $boardUpdated = [
            'title' => 'Title updated',
        ];

        $response = $this->put(route('boards.update', $boards[0]->id), $boardUpdated);

        $response->assertJson([
            'message' => 'Has been updated',
            'board' => [
                'id' => $boards[0]->id,
                'title' => $boardUpdated['title'],
            ], 'code' => 201

        ])->assertStatus(201);
    }

    /** @test */
    public function delete_a_board()
    {
        $boards = Board::factory()->times(10)->create();

        $response = $this->delete(route('boards.destroy', $boards[0]->id));

        $this->assertSoftDeleted('boards', [
            'id' => $boards[0]->id
        ]);

        $response->assertJson([
            'message' => 'Has been deleted',
            'code' => 200
        ])->assertStatus(200);
    }
}
