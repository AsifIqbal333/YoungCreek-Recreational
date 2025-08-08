<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;


class SelectState extends Component
{

    #[On('countryChanged')]
    public function updatedCountry($countryId)
    {
        dd($countryId);
    }

    public function render()
    {
        return view('livewire.select-state');
    }
}
