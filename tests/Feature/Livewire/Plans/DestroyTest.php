<?php

use App\Http\Livewire\Plans\Destroy;
use App\Models\Plan;

use function Pest\Laravel\assertDatabaseCount;
use function Pest\Livewire\livewire;

it('should be able delete a group', function () {
    $plan = Plan::factory()->createOne();

    livewire(Destroy::class, compact('plan'))
        ->call('destroy')
        ->assertEmitted('plan::refresh-list');

    assertDatabaseCount('plans', 0);
});
