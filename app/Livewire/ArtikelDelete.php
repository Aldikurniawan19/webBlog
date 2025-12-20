<?php

namespace App\Livewire;

use App\Models\Artikel;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class ArtikelDelete extends Component
{
    public $id;
    public function mount($id){
        $this->id = $id;
    }

    public function handleDelete(){
        $artikel = Artikel::find($this->id);

        if($artikel->gambar_artikel!= null){
            Storage::disk('public')->delete('artikel/'.$artikel->gambar_artikel);

        }
        $artikel->delete();
        session()->flash('success', 'Artikel berhasil dihapus.');
        return redirect()->route('artikel');
    }
    public function render()
    {
        return view('livewire.artikel-delete');
    }
}
