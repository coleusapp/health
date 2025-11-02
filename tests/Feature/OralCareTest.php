<?php

use Coleus\Health\Models\HealthUser;
use Coleus\Health\Models\OralCare;
use Symfony\Component\HttpFoundation\Response;

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('oral-cares index works', function () {
    $response = $this->get(route('health.oral-cares.index'));
    $response->assertStatus(Response::HTTP_OK);
});

test('oral-cares create works', function () {
    $response = $this->get(route('health.oral-cares.create'));
    $response->assertStatus(Response::HTTP_OK);
});

test('oral-cares store works', function () {
    $data = OralCare::factory()->hasToothpastes(2)->make()->toArray();
    $response = $this->post(route('health.oral-cares.store'), $data);
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseHas(app(OralCare::class)->getTable(), $data);
});

test('oralCare edit works', function () {
    $oralCare = OralCare::factory()->hasToothpastes(2)->create();
    $response = $this->get(route('health.oral-cares.edit', ['oral_care' => $oralCare]));
    $response->assertStatus(Response::HTTP_OK);
});

test('oralCare update works', function () {
    $oralCare = OralCare::factory()->create();
    $data = OralCare::factory()->hasToothpastes(2)->make()->toArray();
    $response = $this->put(route('health.oral-cares.update', ['oral_care' => $oralCare]), $data);
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertDatabaseHas(app(OralCare::class)->getTable(), $data);
});

test('oralCare delete works', function () {
    $oralCare = OralCare::factory()->hasToothpastes(2)->create();
    $response = $this->delete(route('health.oral-cares.destroy', ['oral_care' => $oralCare]));
    $response->assertStatus(Response::HTTP_FOUND);
    $this->assertSoftDeleted($oralCare);
});
