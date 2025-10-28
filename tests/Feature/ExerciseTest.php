<?php

use Coleus\Health\Models\Exercise;
use Coleus\Health\Models\HealthUser;
use Symfony\Component\HttpFoundation\Response;

dataset('primary', [
    fn () => Exercise::factory()->make()->toArray(),
    fn () => Exercise::factory()->allTrue()->make()->toArray(),
    fn () => Exercise::factory()->allFalse()->make()->toArray(),
]);

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('exercises index works', function () {
    assertSuccessfulGet(route('health.exercises.index'));
});

test('exercises create works', function () {
    $this->get(route('health.exercises.create'))
        ->assertStatus(Response::HTTP_OK);
});

test('exercises store works', function ($data) {
    $this->post(route('health.exercises.store'), $data)
        ->assertStatus(302);
    $this->assertDatabaseCount(app(Exercise::class)->getTable(), 1);
    $this->assertEmpty(array_diff($data, Exercise::orderByDesc('id')->first()->toArray()));
})->with('primary');

test('exercise edit works', function () {
    $this->get(route('health.exercises.edit', ['exercise' => Exercise::factory()->create()]))
        ->assertStatus(200);
});

test('exercise update works', function ($data) {
    $this->put(route('health.exercises.update', ['exercise' => Exercise::factory()->create()]), $data)
        ->assertStatus(302);
    $this->assertDatabaseCount(app(Exercise::class)->getTable(), 1);
    $latest = Exercise::orderByDesc('id')->first();
    $this->assertEmpty(array_diff($data, $latest->toArray()));
})->with('primary');

test('exercise delete works', function () {
    $exercise = Exercise::factory()->create();
    $response = $this->delete(route('health.exercises.destroy', ['exercise' => $exercise]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($exercise);
});
