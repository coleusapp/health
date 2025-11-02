<?php

use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\Workout;
use Symfony\Component\HttpFoundation\Response;

dataset('primary', [
    fn () => Workout::factory()->make()->toArray(),
]);

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('workouts index works', function () {
    $response = $this->get(route('health.workouts.index'));
    $response->assertStatus(Response::HTTP_OK);
});

test('workouts create works', function () {
    $response = $this->get(route('health.workouts.create'));
    $response->assertStatus(Response::HTTP_OK);
});

test('workouts store works', function ($data) {
    $response = $this->post(route('health.workouts.store'), $data);
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseCount(app(Workout::class)->getTable(), 1);
})->with('primary');

test('workout edit works', function () {
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->get(route('health.workouts.edit', ['workout' => $workout]));
    $response->assertStatus(Response::HTTP_OK);
});

test('workout update works', function ($data) {
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->put(route('health.workouts.update', ['workout' => $workout]), $data);
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseCount(app(Workout::class)->getTable(), 1);
})->with('primary');

test('workout delete works', function () {
    $workout = Workout::factory()->hasExercises(3)->create();
    $response = $this->delete(route('health.workouts.destroy', ['workout' => $workout]));
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertSoftDeleted($workout);
});
