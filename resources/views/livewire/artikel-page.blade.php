<div>
    <div class="container mx-auto card bg-white shadow-sm space-y-5 p-4">
        <div class=" flex justify-end">
            <a href="{{ route('artikel.create') }}" wire:navigate>
                <button class="btn bg-blue-600 text-white m-4 hover:bg-blue-700 px-4 py-2 text-sm rounded">
                    Artikel Baru
                </button>
            </a>
        </div>
        <table class="table">

            <thead class="bg-gray-200 text-black">
                <tr>
                    <td>No</td>
                    <td>Judul</td>
                    <td>Kategori</td>
                    <td>Konten</td>
                    <td>Status</td>
                    <td>Tanggal Publish</td>
                    <td>Opsi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($artikel as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>{{ Str::limit($item->konten, 80) }}</td>
                        <td>
                            <p
                                class="{{ $item->status == 'draft' ? 'bg-green-200 text-green-700' : 'bg-orange-200 text-orange-700' }} text-center px-2 py-1 rounded-full w-24 capitalize">
                                {{ $item->status }}</p>
                        </td>
                        <td>{{ $item->status == 'publish' ? $item->tanggal_publish : '' }}</td>
                        <td>
                            <div class="dropdown">
                                <div tabindex="0" role="button" class="text-blue-600 underline">Opsi</div>
                                <ul tabindex="-1"
                                    class="dropdown-content menu bg-base-100 rounded-box z-1 w-52 p-2 shadow-sm">
                                    <li><a href="/artikel/{{ $item->slug }}/detail" wire:navigate>Detail</a></li>
                                    <li><a href="/artikel/{{ $item->slug }}/edit" wire:navigate>Edit</a></li>
                                    <li>
                                        @livewire('artikel-delete', ['id' => $item->id])
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
