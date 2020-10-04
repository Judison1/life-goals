<?php

namespace Tests\Feature\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Models\CardList;

class CardListTest extends TestCase
{
    use RefreshDatabase;

    protected $cardList;

    public function setUp(): void
    {
        parent::setUp();
        $this->cardList = CardList::factory()->create();
    }

    /** @test */
    public function a_card_list_is_an_instance_of_CardList()
    {
        $this->assertInstanceOf(CardList::class, $this->cardList);
    }

    /** @test */
    public function a_card_list_belongs_to_board()
    {
        $this->assertInstanceOf('App\Models\Board', $this->cardList->board);
    }

    /** @test */
    public function a_card_list_has_cards()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->cardList->cards
        );
    }
}
