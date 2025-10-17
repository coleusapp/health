<?php

use Coleus\Health\Models\Exercise;
use Coleus\Users\Models\User;
use Symfony\Component\HttpFoundation\Response;

test('exercises index works', function () {
    $this->actingAs(User::factory()->create());
    $this->get(route('health.exercises.index'))
        ->assertStatus(Response::HTTP_OK);
});

test('exercises create works', function () {
    $this->actingAs(User::factory()->create());
    $this->get(route('health.exercises.create'))
        ->assertStatus(Response::HTTP_OK);
});

test('exercises store works', function () {
    $this->actingAs(User::factory()->create());

    foreach ([
                 Exercise::factory()->make()->toArray(),
                 Exercise::factory()->allTrue()->make()->toArray(),
                 Exercise::factory()->allFalse()->make()->toArray(),
             ] as $i => $data) {
        $this->post(route('health.exercises.store'), $data)
            ->assertStatus(302);
        $this->assertDatabaseCount(app(Exercise::class)->getTable(), $i + 1);
        $latest = Exercise::orderByDesc('id')->first();
        $this->assertEmpty(array_diff($data, $latest->toArray()));
    }
});

test('exercise edit works', function () {
    $this->actingAs(User::factory()->create());
    $this->get(route('health.exercises.edit', ['exercise' => Exercise::factory()->create()]))
        ->assertStatus(200);
});

test('exercise update works', function () {
    $this->actingAs(User::factory()->create());
    $exercise = Exercise::factory()->create();
    foreach ([
                 Exercise::factory()->make()->toArray(),
                 Exercise::factory()->allTrue()->make()->toArray(),
                 Exercise::factory()->allFalse()->make()->toArray(),
             ] as $data) {
        $this->put(route('health.exercises.update', ['exercise' => $exercise]), $data)
            ->assertStatus(302);
        $this->assertDatabaseCount(app(Exercise::class)->getTable(), 1);
        $latest = Exercise::orderByDesc('id')->first();
        $this->assertEmpty(array_diff($data, $latest->toArray()));
    }
});

test('exercise delete works', function () {
    $this->actingAs(User::factory()->create());
    $exercise = Exercise::factory()->create();
    $response = $this->delete(route('health.exercises.destroy', ['exercise' => $exercise]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($exercise);
});
