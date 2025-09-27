<?php

use Coleus\Health\Models\OralCare;
use Coleus\Users\Models\User;

test('oral-cares index works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.oral-cares.index'));
    $response->assertStatus(200);
});

test('oral-cares create works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.oral-cares.create'));
    $response->assertStatus(200);
});

test('oral-cares store works', function () {
    $this->actingAs(User::factory()->create());
    $data = OralCare::factory()->hasToothpastes(2)->make()->toArray();
    $response = $this->post(route('health.oral-cares.store'), $data);
    $response->assertStatus(302);
    $this->assertDatabaseHas(app(OralCare::class)->getTable(), $data);
});

test('oralCare edit works', function () {
    $this->actingAs(User::factory()->create());
    $oralCare = OralCare::factory()->hasToothpastes(2)->create();
    $response = $this->get(route('health.oral-cares.edit', ['oral_care' => $oralCare]));
    $response->assertStatus(200);
});

test('oralCare update works', function () {
    $this->actingAs(User::factory()->create());
    $oralCare = OralCare::factory()->create();
    $data = OralCare::factory()->hasToothpastes(2)->make()->toArray();
    $response = $this->put(route('health.oral-cares.update', ['oral_care' => $oralCare]), $data);
    $response->assertStatus(302);
    $this->assertDatabaseHas(app(OralCare::class)->getTable(), $data);
});

test('oralCare delete works', function () {
    $this->actingAs(User::factory()->create());
    $oralCare = OralCare::factory()->hasToothpastes(2)->create();
    $response = $this->delete(route('health.oral-cares.destroy', ['oral_care' => $oralCare]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($oralCare);
});
