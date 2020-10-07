<?php

namespace Tests\Feature\Models;

use App\Models\Tag;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    use RefreshDatabase;

    protected $tag;

    public function setUp(): void
    {
        parent::setUp();
        $this->tag = Tag::factory()->create();
    }

    /** @test */
    public function a_tag_is_an_instance_of_Tag()
    {
        $this->assertInstanceOf(Tag::class, $this->tag);
    }

    /** @test */
    public function a_tag_has_cards()
    {
        $this->assertInstanceOf(
            'Illuminate\Database\Eloquent\Collection',
            $this->tag->cards
        );
    }
}
