<?php

namespace App\Livewire\Category;

use Livewire\Component;

class Recent extends Component
{
    public $category, $recent, $except;

    public function mount(){
        $this->recent = new \App\Models\News;
        if($this->except){
            $this->recent = $this->recent->where('id','!=',$this->except);
        }
        $this->recent = $this->recent->where('category_id', $this->category->id)->limit(10)->get();
    }
    public function render()
    {
        return view('livewire.category.recent');
    }
}
