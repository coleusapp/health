<?php

use Coleus\Users\Models\User;

test('the dashboard works', function () {
    $this->actingAs(User::factory()->create());

    $response = $this->get(route('health.dashboard'));

    $response->assertStatus(200);
});
