<?php

use Coleus\Health\Models\MuscleGroup;
use Coleus\Users\Models\User;

test('muscle-groups index works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.muscle-groups.index'));
    $response->assertStatus(200);
});

test('muscle-groups create works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.muscle-groups.create'));
    $response->assertStatus(200);
});

test('muscle-groups store works', function () {
    $this->actingAs(User::factory()->create());
    $data = MuscleGroup::factory()->make()->toArray();
    $response = $this->post(route('health.muscle-groups.store'), $data);
    $response->assertStatus(302);
    $this->assertDatabaseHas(app(MuscleGroup::class)->getTable(), $data);
});

test('muscleGroup edit works', function () {
    $this->actingAs(User::factory()->create());
    $muscleGroup = MuscleGroup::factory()->create();
    $response = $this->get(route('health.muscle-groups.edit', ['muscle_group' => $muscleGroup]));
    $response->assertStatus(200);
});

test('muscleGroup update works', function () {
    $this->actingAs(User::factory()->create());
    $muscleGroup = MuscleGroup::factory()->create();
    $data = MuscleGroup::factory()->make()->toArray();
    $response = $this->put(route('health.muscle-groups.update', ['muscle_group' => $muscleGroup]), $data);
    $response->assertStatus(302);
    $this->assertDatabaseHas(app(MuscleGroup::class)->getTable(), $data);
});

test('muscleGroup delete works', function () {
    $this->actingAs(User::factory()->create());
    $muscleGroup = MuscleGroup::factory()->create();
    $response = $this->delete(route('health.muscle-groups.destroy', ['muscle_group' => $muscleGroup]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($muscleGroup);
});
