<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\Board;

class BoardTest extends TestCase
{
    use RefreshDatabase;

    protected $board;

    public function setUp(): void
    {
        parent::setUp();
        $this->board = Board::factory()->create();
    }

    /** @test */
    public function a_board_is_an_instance_of_Board()
    {
        $this->assertInstanceOf('App\Models\Board', $this->board);
    }

    /** @test */
    public function a_board_belongs_to_user()
    {
        $this->assertInstanceOf('App\Models\User', $this->board->user);
    }

    /** @test */
    public function a_board_has_card_lists()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->board->cardLists
        );
    }
}
