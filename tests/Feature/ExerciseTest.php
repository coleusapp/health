<?php

use Coleus\Health\Models\Exercise;
use Coleus\Users\Models\User;

test('exercises index works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.exercises.index'));
    $response->assertStatus(200);
});

test('exercises create works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.exercises.create'));
    $response->assertStatus(200);
});

test('exercises store works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->post(route('health.exercises.store'), Exercise::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Exercise::class)->getTable(), 1);
});

test('exercise edit works', function () {
    $this->actingAs(User::factory()->create());
    $exercise = Exercise::factory()->create();
    $response = $this->get(route('health.exercises.edit', ['exercise' => $exercise]));
    $response->assertStatus(200);
});

test('exercise update works', function () {
    $this->actingAs(User::factory()->create());
    $exercise = Exercise::factory()->create();
    $response = $this->put(route('health.exercises.update', ['exercise' => $exercise]), Exercise::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Exercise::class)->getTable(), 1);
});

test('exercise delete works', function () {
    $this->actingAs(User::factory()->create());
    $exercise = Exercise::factory()->create();
    $response = $this->delete(route('health.exercises.destroy', ['exercise' => $exercise]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($exercise);
});
