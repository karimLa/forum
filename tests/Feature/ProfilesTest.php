<?php

namespace Tests\Feature;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_has_a_profile()
    {
        $user = create(User::class);

        $this->get("/profile/$user->name")
            ->assertStatus(200)
            ->assertSee($user->name);
    }

    /** @test */
    public function profile_displays_all_threads_created_by_the_assiciated_user()
    {
        $user = create(User::class);
        $thread = create(Thread::class, ['user_id' => $user->id]);

        $this->get("/profile/$user->name")
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
