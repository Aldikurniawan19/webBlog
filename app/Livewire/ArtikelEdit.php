<?php

namespace App\Livewire;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArtikelEdit extends Component
{
    use WithFileUploads;
    public $kategori, $artikel, $judul, $kategori_id, $konten, $status, $gambar_artikel ;

    public function mount($slug){
        $this->artikel = Artikel::where('slug', $slug)->first();
        $this->kategori = Kategori::all();
        $this->judul = $this->artikel->judul;
        $this->kategori_id = $this->artikel->kategori_id;
        $this->konten = $this->artikel->konten;
        $this->status = $this->artikel->status;
    }

     public function rules(){
        return [
            'judul' => 'required',
            'kategori_id' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'gambar_artikel' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ];
    }

    public function messages(){
        return [
            'judul.required' => 'Judul wajib diisi',
            'kategori_id.required' => 'Kategori wajib diisi',
            'konten.required' => 'Konten wajib diisi',
            'status.required' => 'Status wajib diisi',
            'gambar_artikel.required' => 'Gambar Artikel wajib diisi',
            'gambar_artikel.image' => 'File harus berupa gambar',
            'gambar_artikel.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'gambar_artikel.max' => 'Ukuran gambar maksimal 2MB',
        ];
    }

    public function handleSubmit()
    {
        $this->validate();

        $fileName = $this->artikel->gambar_artikel;
        $file = $this->gambar_artikel;
        
        if($file){
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('artikel', $file, $fileName);
        }

            $artikel =  Artikel::find($this->artikel->id);
            $artikel->judul = $this->judul;
            $artikel->kategori_id = $this->kategori_id;
            $artikel->konten = $this->konten;
            $artikel->status = $this->status;
            $artikel->gambar_artikel = $fileName;
            $artikel->slug = Str::slug($this->judul);
            $artikel->save();

        session()->flash('success', 'Artikel berhasil diubah.');
        return redirect()->route('artikel');
    }
    public function render()
    {
        return view('livewire.artikel-edit');
    }
}
