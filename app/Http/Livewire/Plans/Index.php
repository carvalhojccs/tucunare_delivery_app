<?php

namespace App\Http\Livewire\Plans;

use Livewire\Component;

class Index extends Component
{
    public string $name = 'Plano 1';
    public string $url = 'plano-1';
    public string $price = '100,00';
    public string $description = '';
    
    public function render()
    {
        return view('livewire.plans.index');
    }
}
