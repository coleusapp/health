<?php

use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\Toothpaste;

test('toothpastes index works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->get(route('health.toothpastes.index'));
    $response->assertStatus(200);
});

test('toothpastes create works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->get(route('health.toothpastes.create'));
    $response->assertStatus(200);
});

test('toothpastes store works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $response = $this->post(route('health.toothpastes.store'), Toothpaste::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Toothpaste::class)->getTable(), 1);
});

test('toothpaste edit works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $toothpaste = Toothpaste::factory()->create();
    $response = $this->get(route('health.toothpastes.edit', ['toothpaste' => $toothpaste]));
    $response->assertStatus(200);
});

test('toothpaste update works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $toothpaste = Toothpaste::factory()->create();
    $response = $this->put(route('health.toothpastes.update', ['toothpaste' => $toothpaste]), Toothpaste::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Toothpaste::class)->getTable(), 1);
});

test('toothpaste delete works', function () {
    $user = HealthUser::factory()->create();
    $this->actingAs($user);
    $toothpaste = Toothpaste::factory()->create();
    $response = $this->delete(route('health.toothpastes.destroy', ['toothpaste' => $toothpaste]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($toothpaste);
});
