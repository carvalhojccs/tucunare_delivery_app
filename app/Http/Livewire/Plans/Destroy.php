<?php

namespace App\Http\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;

class Destroy extends Component
{
    public ?Plan $plan = null;

    public function destroy()
    {
        $this->plan->delete();
        $this->emit('plan::refresh-list');
    }

    public function render()
    {
        return view('livewire.plans.destroy');
    }
}
