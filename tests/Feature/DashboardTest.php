<?php

use Coleus\Health\Models\HealthUser;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('the dashboard works', function () {
    return test()->get(route('health.dashboard'))
        ->assertStatus(Response::HTTP_OK);
});
