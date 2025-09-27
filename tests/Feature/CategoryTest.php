<?php

use Coleus\Health\Models\Category;
use Coleus\Users\Models\User;

test('categories index works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.categories.index'));
    $response->assertStatus(200);
});

test('categories create works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->get(route('health.categories.create'));
    $response->assertStatus(200);
});

test('categories store works', function () {
    $this->actingAs(User::factory()->create());
    $response = $this->post(route('health.categories.store'), Category::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Category::class)->getTable(), 1);
});

test('category edit works', function () {
    $this->actingAs(User::factory()->create());
    $category = Category::factory()->create();
    $response = $this->get(route('health.categories.edit', ['category' => $category]));
    $response->assertStatus(200);
});

test('category update works', function () {
    $this->actingAs(User::factory()->create());
    $category = Category::factory()->create();
    $response = $this->put(route('health.categories.update', ['category' => $category]), Category::factory()->make()->toArray());
    $response->assertStatus(302);
    $this->assertDatabaseCount(app(Category::class)->getTable(), 1);
});

test('category delete works', function () {
    $this->actingAs(User::factory()->create());
    $category = Category::factory()->create();
    $response = $this->delete(route('health.categories.destroy', ['category' => $category]));
    $response->assertStatus(302);
    $this->assertSoftDeleted($category);
});
