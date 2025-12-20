<?php

namespace App\Livewire;

use App\Models\Artikel;
use Carbon\Carbon;
use Livewire\Component;

class ArtikelPage extends Component
{
    public $artikel;

    public function mount()
    {
        $this->artikel = Artikel::with('kategori')->orderBy('created_at', 'DESC')->get()->map(function($item){
            $item->tanggal_publish = Carbon::parse($item->updated_at)->locale('id')->translatedFormat('l, d F Y');            
            return $item;
        });



        
    }
    public function render()
    {
        return view('livewire.artikel-page');
    }
}
