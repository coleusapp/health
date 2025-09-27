<?php

use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\Weight;

test('weights index works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->get(route('health.weights.index'));
    $response->assertStatus(200);
});

test('weights create works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->get(route('health.weights.create'));
    $response->assertStatus(200);
});

test('weights store works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->post(route('health.weights.store'), Weight::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Weight::class)->getTable(), 1);
});

test('weight edit works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $weight = Weight::factory()->create();
    $response = $this->get(route('health.weights.edit', ['weight' => $weight]));
    $response->assertStatus(200);
});

test('weight update works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $weight = Weight::factory()->create();
    $response = $this->put(route('health.weights.update', ['weight' => $weight]), Weight::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Weight::class)->getTable(), 1);
});

test('weight delete works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $weight = Weight::factory()->create();
    $response = $this->delete(route('health.weights.destroy', ['weight' => $weight]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($weight);
});
