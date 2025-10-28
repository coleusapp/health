<?php

use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\Workout;

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('workouts index works', function () {
    $response = $this->get(route('health.workouts.index'));
    $response->assertStatus(200);
});

test('workouts create works', function () {
    $response = $this->get(route('health.workouts.create'));
    $response->assertStatus(200);
});

test('workouts store works', function () {
    $response = $this->post(route('health.workouts.store'), Workout::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Workout::class)->getTable(), 1);
});

test('workout edit works', function () {
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->get(route('health.workouts.edit', ['workout' => $workout]));
    $response->assertStatus(200);
});

test('workout update works', function () {
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->put(route('health.workouts.update', ['workout' => $workout]), Workout::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Workout::class)->getTable(), 1);
});

test('workout delete works', function () {
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->delete(route('health.workouts.destroy', ['workout' => $workout]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($workout);
});
