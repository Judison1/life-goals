<?php

namespace Tests\Feature\Models;

use App\Models\Attachment;
use App\Models\Card;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AttachmentTest extends TestCase
{
    use RefreshDatabase;

    protected $attachment;

    public function setUp(): void
    {
        parent::setUp();
        $this->attachment = Attachment::factory()->create();
    }

    /** @test */
    public function an_attachment_is_an_instance_of_Attachment()
    {
        $this->assertInstanceOf(Attachment::class, $this->attachment);
    }

    /** @test */
    public function an_attachment_belongs_to_attachable()
    {
        $this->assertInstanceOf(Card::class, $this->attachment->attachable);
    }
}
