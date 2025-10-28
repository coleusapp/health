<?php

use Coleus\Health\Models\Category;
use Coleus\Health\Models\HealthUser;

beforeEach(function () {
    $this->actingAs(HealthUser::factory()->create());
});

test('categories index works', function () {
    $this->get(route('health.categories.index'))
        ->assertOk();
});

test('categories create works', function () {
    $this->get(route('health.categories.create'))
        ->assertOk();
});

test('categories store works', function () {
    $this->post(route('health.categories.store'), Category::factory()->make()->toArray())
        ->assertRedirect(route('health.categories.edit', ['category' => 1]));
});

test('category edit works', function () {
    $this->get(route('health.categories.edit', ['category' => Category::factory()->create()]))
        ->assertOk();
});

test('category update works', function () {
    $category = Category::factory()->create();
    $this->put(
        route('health.categories.update',
            ['category' => $category]), Category::factory()->make()->toArray())
        ->assertRedirect(route('health.categories.edit', ['category' => $category]));
});

test('category delete works', function () {
    $category = Category::factory()->create();
    assertSuccessfulDelete(route('health.categories.destroy', ['category' => $category]));
    $this->assertSoftDeleted($category);
});
