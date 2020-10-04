<?php

namespace Tests\Feature\Models;

use App\Models\Card;
use App\Models\CardList;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTest extends TestCase
{
    use RefreshDatabase;

    protected $card;

    public function setUp(): void
    {
        parent::setUp();
        $this->card = Card::factory()->create();
    }

    /** @test */
    public function a_card_is_an_instance_of_Card()
    {
        $this->assertInstanceOf(Card::class, $this->card);
    }

    /** @test */
    public function a_card_belongs_to_card_list()
    {
        $this->assertInstanceOf(CardList::class, $this->card->cardList);
    }

    /** @test */
    public function a_card_has_tags()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->card->tags
        );
    }

    /** @test */
    public function a_card_has_attachments()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->card->attachments
        );
    }
}
