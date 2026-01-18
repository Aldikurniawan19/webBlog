<?php

namespace App\Livewire;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ArtikelCreate extends Component
{
    use WithFileUploads;
    public $kategori,  $judul, $kategori_id, $konten, $status, $gambar_artikel;
    public function mount()
    {
        $this->kategori = Kategori::all();
    }
    public function render()
    {
        return view('livewire.artikel-create');
    }

    public function rules()
    {
        return [
            'judul' => 'required',
            'kategori_id' => 'required',
            'konten' => 'required',
            'status' => 'required',
            'gambar_artikel' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages()
    {
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
        $file = $this->gambar_artikel;
        $fileName = time() . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->putFileAs('artikel', $file, $fileName);

        Artikel::create([
            'judul'               => $this->judul,
            'kategori_id'         => $this->kategori_id,
            'konten'              => $this->konten,
            'status'              => $this->status,
            'gambar_artikel'      =>  $fileName,
            'slug'                => Str::slug($this->judul),
        ]);

        session()->flash('success', 'Artikel berhasil dibuat.');
        return redirect()->route('artikel');
    }
}
