<?php

namespace App\Http\Livewire\Plans;

use App\Models\Plan;
use Livewire\Component;

class Create extends Component
{
    public Plan $plan;

    protected array $rules = [
        'plan.name'         => ['required', 'string', 'min:3', 'max:30', 'unique:plans,name'],
        'plan.url'          => ['required', 'string', 'min:3', 'max:30', 'unique:plans,url'],
        'plan.price'        => ['required', 'numeric'],
        'plan.description'  => ['nullable', 'string', 'min:3', 'max:200']
    ];

    public function mount()
    {
        $this->plan = new Plan();
    }

    public function save()
    {
        $this->validate();
        $this->plan->save();
    }

    public function render()
    {
        return view('livewire.plans.create');
    }
}
