<?php

namespace App\Livewire;

use App\Models\Country;
use Livewire\Component;

class SelectCountry extends Component
{
    public $countries;
    public $country;
    public $default_value;
    public $attr_name;

    public function mount($name, $default_value)
    {
        $this->countries = Country::select(['id', 'name'])->get();
        $this->attr_name = $name;
        $this->default_value = $default_value;
    }
    public function render()
    {
        return view('livewire.select-country');
    }

    public function updatedCountry()
    {
        dd($this->country);
    }

    public function countryChanged($country)
    {
        dd($country);
    }
}
