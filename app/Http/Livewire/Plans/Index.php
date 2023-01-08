<?php

namespace App\Http\Livewire\Plans;

use Livewire\Component;

class Index extends Component
{
    public string $name = '';
    public string $url = '';
    public string $price = '';
    public string $description = '';

    protected $listeners = [
        'plan::refresh-list' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.plans.index');
    }
}
