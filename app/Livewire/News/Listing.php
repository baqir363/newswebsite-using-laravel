<?php

namespace App\Livewire\News;

use Livewire\Component;

class Listing extends Component
{
    public $news;
    public function render()
    {
        return view('livewire.news.listing');
    }
}
