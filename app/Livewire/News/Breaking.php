<?php

namespace App\Livewire\News;

use Livewire\Component;

class Breaking extends Component
{

    public $collection;
    public function mount(){
        $this->collection = \App\Models\Collection::where('name', 'breaking')->latest()->get();
    }
    public function render()
    {
        return view('livewire.news.breaking');
    }
}
