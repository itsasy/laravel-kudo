<?php

namespace Tests\Feature;

use App\Models\Board;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_all_publications_from_a_board()
    {
        User::factory()->create();
        $board = Board::factory()->create();
        $publications = Publication::factory()->times(50)->create();

        $response = $this->get(route('board.publications', $board->id));

        $response->assertJsonFragment([
            'id' => $publications[0]->id,
            'description' => $publications[0]->description,
            'board_id' => $board->id
        ])->assertStatus(200);
    }

    /** @test */
    public function create_a_publication()
    {
        User::factory()->create();
        $board = Board::factory()->create();
        $publication = Publication::factory()->raw();

        $response = $this->post(route('publications.store'), $publication);

        $this->assertDatabaseHas('publications', $publication);

        $response->assertJson([
            'message' => 'Has been created',
            'publication' => [
                'description' => $publication['description'],
                'board_id' => $board->id
            ],
            'code' => 201
        ])->assertStatus(201);
    }

    /** @test */
    public function update_a_publication()
    {
        User::factory()->create();
        $board = Board::factory()->create();
        $publications = Publication::factory()->times(50)->create();

        $publicationUpdated = [
            'description' => 'Description updated',
        ];

        $response = $this->put(route('publications.update', $publications[0]->id), $publicationUpdated);

        $response->assertJson([
            'message' => 'Has been updated',
            'publication' => [
                'id' => $publications[0]->id,
                'description' => $publicationUpdated['description'],
                'board_id' => $board->id
            ], 'code' => 201

        ])->assertStatus(201);
    }

    /** @test */
    public function delete_a_publication()
    {
        User::factory()->times(10)->create();
        $board = Board::factory()->create();
        $publications = Publication::factory()->times(50)->create();

        $response = $this->delete(route('publications.destroy', $publications[0]->id));

        $this->assertSoftDeleted('publications', [
            'id' => $publications[0]->id,
            'board_id' => $board->id
        ]);

        $response->assertJson([
            'message' => 'Has been deleted',
            'code' => 200
        ])->assertStatus(200);
    }
}
