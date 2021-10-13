<?php

namespace Database\Factories;

use App\Models\Board;
use App\Models\Publication;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->pluck('id');
        $board = Board::all()->pluck('id');

        return [
            'description' => $this->faker->text,
            'board_id' => $this->faker->randomElement($board),
            'user_id' => $this->faker->randomElement($user)
        ];
    }
}
