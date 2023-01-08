<?php

use App\Http\Livewire\Plans\Update;
use App\Models\Plan;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->plan = Plan::factory()->createOne([
        'name' => 'Old plan name',
        'url' => 'old-plan-name',
        'price' => 100.00,
        'description' => 'Old description plan '
    ]);
    ;
});

it('shoul be able to upgrade a plan name', function () {
    $plan = $this->plan;

    livewire(Update::class, compact('plan'))
        ->set('plan.name', 'New plan name')
        ->set('plan.url', 'new-plan-name')
        ->set('plan.price', 90)
        ->set('plan.description', 'New plan description')
        ->call('save')
        ->assertHasNoErrors()
        ->assertEmitted('plan::refresh-list');

    expect($plan->refresh())
        ->name->toBe('New plan name')
        ->url->toBe('new-plan-name')
        ->price->toBeNumeric(90)
        ->description->toBe('New plan description');
});

#region validations
test('name should be required', function () {
    $plan = $this->plan;

    livewire(Update::class, compact('plan'))
        ->set('plan.name', '')
        ->call('save')
        ->assertHasErrors(['plan.name' => 'required']);
});

test('name should be a valid string', function () {
    $plan = $this->plan;

    livewire(Update::class, compact('plan'))
        ->set('plan.name', 1)
        ->call('save')
        ->assertHasErrors(['plan.name' => 'string']);
});

test('name should have a min of 3 characters', function () {
    $plan = $this->plan;

    livewire(Update::class, compact('plan'))
        ->set('plan.name', 'a')
        ->call('save')
        ->assertHasErrors(['plan.name' => 'min']);
});

test('name should have a max of 30 chraracters', function () {
    $plan = $this->plan;

    livewire(Update::class, compact('plan'))
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

    $plan = $this->plan;

    livewire(Update::class, compact('plan'))
        ->set('plan.name', 'Plano teste')
        ->call('save')
        ->assertHasErrors(['plan.name' => 'unique']);
});
#end regions
