<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\Channel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_may_not_create_new_threads()
    {
        $this->get(route('create_thread'))
            ->assertRedirect('login');

        $thread = raw(Thread::class);

        $this->post('/threads/', $thread)
            ->assertRedirect('login');
    }

    /** @test */
    public function an_authenticated_user_can_create_new_threads()
    {
        $this->signIn();

        $thread = raw(Thread::class);

        $this->post('/threads/', $thread);

        $this->assertDatabaseCount('threads', 1);

        $this->get('/threads/')
            ->assertSee($thread['title'])
            ->assertSee($thread['body']);
    }

    /** @test */
    public function a_thread_requires_a_title()
    {
        $this->publishThread(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_thread_requires_a_body()
    {
        $this->publishThread(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_thread_requires_a_valid_channel()
    {
        Channel::factory()->count(2)->create();

        $this->publishThread(['channel_id' => null])
            ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 999])
            ->assertSessionHasErrors('channel_id');
    }

    public function publishThread($overrides = [])
    {
        $this->signIn();

        $thread = make(Thread::class, $overrides);

        return $this->post('/threads/', $thread->toArray());
    }
}
