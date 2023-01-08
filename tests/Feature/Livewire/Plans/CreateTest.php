<?php

use App\Http\Livewire\Plans\Create;
use App\Models\Plan;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;

it('should be able to create a new plan', function () {
    livewire(Create::class)
        ->set('plan.name', 'Plano master')
        ->set('plan.url', 'plano-master')
        ->set('plan.price', '100.00')
        ->set('plan.description', '')
        ->call('save')
        ->assertHasNoErrors()
        ->assertEmitted('plan::refresh-list');

    assertDatabaseCount(Plan::class, 1);
});

#region validations
test('name should be required', function () {
    livewire(Create::class)
        ->call('save')
        ->assertHasErrors(['plan.name' => 'required']);
});

test('name should be a valid string', function () {
    livewire(Create::class)
        ->set('plan.name', 1)
        ->call('save')
        ->assertHasErrors(['plan.name' => 'string']);
});

test('name should have a min of 3 characters', function () {
    livewire(Create::class)
        ->set('plan.name', 'a')
        ->call('save')
        ->assertHasErrors(['plan.name' => 'min']);
});

test('name should have a max of 30 chraracters', function () {
    livewire(Create::class)
        ->set('plan.name', str_repeat('a', 31))
        ->call('save')
        ->assertHasErrors(['plan.name' => 'max']);
});

test('name should be unique', function () {
    Plan::factory()->create([
        'name' => 'Plano teste',
        'url' => 'plano-teste',
        'price' => 0.00,
        'description' => ''
    ]);

    livewire(Create::class)
        ->set('plan.name', 'Plano teste')
        ->call('save')
        ->assertHasErrors(['plan.name' => 'unique']);
});
#end regions
