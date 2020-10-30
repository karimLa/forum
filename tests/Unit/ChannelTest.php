<?php

namespace Tests\Unit;

use App\Models\Channel;
use App\Models\Thread;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChannelTest extends TestCase
{
    use RefreshDatabase;

    protected Channel $channel;

    public function setUp(): void
    {
        parent::setUp();

        $this->channel = create(Channel::class);
    }

    /** @test */
    public function it_has_a_Threads()
    {
        $thread = create(Thread::class, ['channel_id' => $this->channel->id]);

        $this->assertTrue($this->channel->threads->contains($thread));
    }
}
