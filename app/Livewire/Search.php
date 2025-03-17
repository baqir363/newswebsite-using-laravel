<?php

namespace App\Livewire;

use Livewire\Component;

class Search extends Component
{
    public $keyword, $results=array();

    public function updatedKeyword(){
        if($this->results!=''){
            $this->results = \App\Models\News::where('heading','like', '%'. $this->keyword.'%')->limit(8)->get();
        }
    }
    public function render()
    {
        return view('livewire.search');
    }
}
