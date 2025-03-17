<?php
namespace App\Livewire\City;

use Livewire\Component;
use App\Models\City;

class Autocomplete extends Component
{
    public $city, $state, $country, $city_id, $keyword = '', $results = [], $event;

    public function mount($city_id = null, $event = null)
    {
        $this->event = $event;
        $this->city_id = $city_id;

        if ($city_id) {
            $existingCity = City::with(['state', 'country'])->find($city_id);
            if ($existingCity) {
                $this->city = $existingCity->name;
                $this->state = $existingCity->state->name ?? null;
                $this->country = $existingCity->country->name ?? null;
            }
        }
    }

    public function updatedKeyword()
    {
        if (!empty($this->keyword)) {
            $this->results = City::with(['state', 'country'])->where('name', 'like', '%' . $this->keyword . '%')->limit(8)->get();
        } else {
            $this->results = [];
        }
    }

    public function select(City $city)
    {
        $this->city = $city->name;
        $this->state = $city->state->name ?? null;
        $this->country = $city->country->name ?? null;

        if ($this->event) {
            $this->dispatch($this->event, $city->id);
        }

        $this->reset(['keyword', 'results']);
    }

    public function clear()
    {
        $this->reset(['city', 'city_id','state', 'country']);
        $this->dispatch($this->event, null);
    }

    public function render()
    {
        return view('livewire.city.autocomplete');
    }
}
