<div>
    <div class="container mx-auto px-4 py-8">
        <div class="card bg-white shadow-sm p-10">
            <div class="flex justify-end">
                <a href="{{ route('artikel') }}" wire:navigate class="capitalize text-blue-600">Kembali</a>
            </div>
            <h1 class="font-bold text-2xl">Judul :{{ $artikel->judul }}</h1>
            <p>Kategori :{{ $artikel->kategori->nama_kategori }}</p>
            <p>Status :{{ $artikel->status }}</p>
            <p>Tanggal Publis :{{ $artikel->status == 'publish' ? $artikel->tanggal_publish : '' }}</p>
            <div class="grid grid-cols-3 gap-10">
                <div class="mt-5 col-span-2">
                    <p>Konten :</p>
                    <p class="text-justify">{{ $artikel->konten }}</p>
                </div>
                <div class="col-span-1">
                    <img src="{{ asset('storage/artikel/' . $artikel->gambar_artikel) }}" alt=""
                        class="w-full aspect-video object-cover shadow rounded">
                </div>
            </div>
        </div>
    </div>
</div>
