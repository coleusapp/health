<?php

use Coleus\Health\Models\HealthUser;

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('the dashboard works', function () {
    assertSuccessfulGet(route('health.dashboard'));
});
