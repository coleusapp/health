<?php

use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\Toothpaste;
use Coleus\Users\Models\User;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('toothpastes index works', function () {
    $response = $this->get(route('health.toothpastes.index'));
    $response->assertStatus(Response::HTTP_OK);
});

test('toothpastes create works', function () {
    $response = $this->get(route('health.toothpastes.create'));
    $response->assertStatus(Response::HTTP_OK);
});

test('toothpastes store works', function () {
    $response = $this->post(route('health.toothpastes.store'), Toothpaste::factory()->make()->toArray());
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseCount(app(Toothpaste::class)->getTable(), 1);
});

test('toothpaste edit works', function () {
    $toothpaste = Toothpaste::factory()->create();
    $response = $this->get(route('health.toothpastes.edit', ['toothpaste' => $toothpaste]));
    $response->assertStatus(Response::HTTP_OK);
});

test('toothpaste update works', function () {
    $toothpaste = Toothpaste::factory()->create();
    $response = $this->put(route('health.toothpastes.update', ['toothpaste' => $toothpaste]), Toothpaste::factory()->make()->toArray());
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseCount(app(Toothpaste::class)->getTable(), 1);
});

test('toothpaste delete works', function () {
    $toothpaste = Toothpaste::factory()->create();
    $response = $this->delete(route('health.toothpastes.destroy', ['toothpaste' => $toothpaste]));
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertSoftDeleted($toothpaste);
});
