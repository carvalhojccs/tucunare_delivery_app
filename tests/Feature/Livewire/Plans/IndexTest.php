<?php

use App\Http\Livewire\Plans\Index;
use App\Models\Plan;

use function Pest\Livewire\livewire;

it('should list all de plans', function () {
    $newPlans = Plan::factory()->count(3)->create();



    livewire(Index::class)
        ->assertSet('plans', function ($plans) use ($newPlans) {
            if ($newPlans->count() === 3) {
                return true;
            }
        });
});
