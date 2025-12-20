<?php

namespace App\Livewire;

use App\Models\Artikel;
use Carbon\Carbon;
use Livewire\Component;

class ArtikelDetail extends Component
{
    public $slug, $artikel;
    public function mount($slug)
    {
        $this->slug = $slug;
        $this->artikel = Artikel::where('slug', $slug)->first();
        $this->artikel->tanggal_publish = Carbon::parse($this->artikel->updated_at)->locale('id')->translatedFormat('l, d F Y');
    }
    public function render()
    {
        return view('livewire.artikel-detail');
    }
}
