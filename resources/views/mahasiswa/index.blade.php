<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- HANYA ADMIN YANG BISA TAMPILKAN TOMBOL TAMBAH --}}
                @if (Auth::user()->role === 'admin')
                    <div class="mb-4">
                        <a href="{{ route('mahasiswa.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            + Tambah Mahasiswa
                        </a>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100 border-b">
                                <th class="py-2 px-4 border-r text-left">NIM</th>
                                <th class="py-2 px-4 border-r text-left">Nama</th>
                                <th class="py-2 px-4 border-r text-left">Prodi</th>
                                <th class="py-2 px-4 border-r text-left">No. HP</th>
                                <th class="py-2 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswas as $mhs)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="py-2 px-4 border-r">{{ $mhs->nim }}</td>
                                    <td class="py-2 px-4 border-r">{{ $mhs->nama_mahasiswa }}</td>
                                    <td class="py-2 px-4 border-r">{{ $mhs->program_studi }}</td>
                                    <td class="py-2 px-4 border-r">{{ $mhs->nomor_hp }}</td>
                                    <td class="py-2 px-4 text-center">
                                        <!-- SEMUA USER (ADMIN & MEMBER) BISA LIHAT DETAIL -->
                                        <a href="{{ route('mahasiswa.show', $mhs->id) }}" class="text-green-600 hover:underline mr-2">Detail</a>

                                        <!-- HANYA ADMIN YANG BISA EDIT DAN HAPUS -->
                                        @if (Auth::user()->role === 'admin')
                                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                                            
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="py-4 text-center text-gray-500">Belum ada data mahasiswa.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $mahasiswas->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>