<?php

namespace App\Http\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;

class Update extends Component
{
    public Plan $plan;

    protected array $rules = [
        'plan.name'         => ['required', 'string', 'min:3', 'max:30', 'unique:plans,name'],
        'plan.url'          => ['required', 'string', 'min:3', 'max:30', 'unique:plans,url'],
        'plan.price'        => ['required', 'numeric'],
        'plan.description'  => ['nullable', 'string', 'min:3', 'max:200']
    ];

    public function save()
    {
        $this->validate();
        $this->plan->save();
        $this->emit('plan::refresh-list');
    }

    public function render()
    {
        return view('livewire.plans.update');
    }
}
