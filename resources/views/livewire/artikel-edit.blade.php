<div>
    <div class="container mx-auto p-5">
        <div class="card bg-white shadow-sm p-5">
            <div class="flex justify-end">
                <x-button-kembali :route="route('artikel')" />
            </div>
            <div>
                <form class="space-y-5" wire:submit.prevent="handleSubmit">
                    <div class="flex flex-col py-4 gap-y-1">
                        <label for="" class="label">Judul</label>
                        <input type="text" class="input w-full" wire:model="judul">
                        @error('judul')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex flex-col py-4 gap-y-1">
                        <label for="" class="label">Kategori</label>
                        <select class="input w-full cursor-pointer" wire:model="kategori_id">
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex flex-col py-4 gap-y-1">
                        <label for="" class="label">Status</label>
                        <select class="input w-full cursor-pointer" wire:model="status">
                            <option value="">Pilih Status</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                        @error('status')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex flex-col py-4 gap-y-1">
                        <label for="" class="label">Gambar Artikel</label>
                        <input type="file" class="input w-full" wire:model="gambar_artikel">
                        @error('gambar_artikel')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex flex-col py-4 gap-y-1">
                        <label for="" class="label">Konten</label>
                        <textarea class="input w-full h-40" wire:model="konten"></textarea>
                        @error('konten')
                            <small class="text-red-500">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button class="btn bg-blue-700 text-white m-2 px-4 py-2 hover:bg-blue-500">Simpan
                            Artikel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
