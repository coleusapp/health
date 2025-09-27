<?php

use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\Workout;
use Coleus\Users\Models\User;

test('workouts index works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->get(route('health.workouts.index'));
    $response->assertStatus(200);
});

test('workouts create works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->get(route('health.workouts.create'));
    $response->assertStatus(200);
});

test('workouts store works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->post(route('health.workouts.store'), Workout::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Workout::class)->getTable(), 1);
});

test('workout edit works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->get(route('health.workouts.edit', ['workout' => $workout]));
    $response->assertStatus(200);
});

test('workout update works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->put(route('health.workouts.update', ['workout' => $workout]), Workout::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Workout::class)->getTable(), 1);
});

test('workout delete works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->delete(route('health.workouts.destroy', ['workout' => $workout]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($workout);
});
