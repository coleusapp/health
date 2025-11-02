<?php

use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\MuscleGroup;
use Symfony\Component\HttpFoundation\Response;

dataset('primary', [
    fn () => MuscleGroup::factory()->withParent()->make()->toArray(),
    fn () => MuscleGroup::factory()->withoutParent()->make()->toArray(),
]);

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('muscle-groups index works', function () {
    $this->get(route('health.muscle-groups.index'))
        ->assertStatus(Response::HTTP_OK);
});

test('muscle-groups create works', function () {
    $this->get(route('health.muscle-groups.create'))
        ->assertStatus(Response::HTTP_OK);
});

test('muscle-groups store works', function ($data) {
    $this->post(route('health.muscle-groups.store'), $data)
        ->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseHas(app(MuscleGroup::class)->getTable(), $data);
})->with('primary');

test('muscleGroup edit works', function () {
    $muscleGroup = MuscleGroup::factory()->create();
    $this->get(route('health.muscle-groups.edit', ['muscle_group' => $muscleGroup]))
        ->assertStatus(Response::HTTP_OK);
});

test('muscleGroup update works', function ($data) {
    $this->put(route('health.muscle-groups.update', ['muscle_group' => MuscleGroup::factory()->create()]), $data)
        ->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseHas(app(MuscleGroup::class)->getTable(), $data);
})->with('primary');

test('muscleGroup delete works', function () {
    $muscleGroup = MuscleGroup::factory()->create();
    $response = $this->delete(route('health.muscle-groups.destroy', ['muscle_group' => $muscleGroup]));
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertSoftDeleted($muscleGroup);
});
