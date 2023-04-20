<?php

namespace Tests\Feature;

use App\Models\Collection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CollectionTest extends TestCase
{
    private User $user;
    private User $otherUser;
    private Collection $collection;

    protected function setUp(): void
    {
        // Ensure that the app is prepared
        parent::setUp();

        // Prepare the environment for my particular set of tests!
        $users = User::factory(2)->create();

        /** @var User */
        $this->user = $users->get(0);

        $this->collection = $this->user->collections()->create([
            'name' => 'Some name'
        ]);

        $this->otherUser = $users->get(1);
        echo "Setting up...\n";
    }

    /**
     * A basic feature test example.
     */
    public function test_users_can_view_form_to_update_their_own_collections(): void
    {
        $editUrl = route('collections.edit', $this->collection);
        $this->actingAs($this->user)->get($editUrl)->assertOk();
        $this->actingAs($this->otherUser)->get($editUrl)->assertForbidden();
    }

    public function test_users_can_post_to_update_their_collections()
    {
        $updateUrl = route('collections.update', $this->collection);

        $this->actingAs($this->user)->putJson($updateUrl, [
            'name' => 'new name'
        ])->assertOk();

        $this->actingAs($this->otherUser)->putJson($updateUrl, [
            'name' => 'new name'
        ])->assertForbidden();
    }

    public function test_update_validation_rules()
    {
        $updateUrl = route('collections.update', $this->collection);

        $this->actingAs($this->user)->putJson($updateUrl, [
            'name' => 'new name'
        ])->assertOk();

        $this->actingAs($this->user)->putJson($updateUrl, [
            'missing name' => 'new name'
        ])->assertUnprocessable();

        $this->actingAs($this->user)->putJson($updateUrl, [
            'name' => 'a'
        ])->assertUnprocessable();

        $this->actingAs($this->user)->putJson($updateUrl, [
            'name' => 'funny name @!"'
        ])->assertUnprocessable();
    }
}
