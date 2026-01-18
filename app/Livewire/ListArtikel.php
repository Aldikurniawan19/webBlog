<?php

namespace App\Livewire;

use App\Models\Artikel;
use Livewire\Component;

class ListArtikel extends Component
{ 
    public $artikel;
    public function mount()
    {
        $this->artikel = Artikel::limit(6)->get();
    }
    public function render()
    {
        return view('livewire.list-artikel')->layout('layouts.blog');
    }
}
