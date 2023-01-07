<?php

namespace Tests\Feature\Livewire\Plans;

use App\Http\Livewire\Plans\Destroy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class DestroyTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(Destroy::class);

        $component->assertStatus(200);
    }
}
