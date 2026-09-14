<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="grid grid-cols-2 gap-4">
                    <div><strong>NIM:</strong> {{ $mahasiswa->nim }}</div>
                    <div><strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa }}</div>
                    <div><strong>Tempat, Tgl Lahir:</strong> {{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir }}</div>
                    <div><strong>Jenis Kelamin:</strong> {{ $mahasiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
                    <div><strong>Program Studi:</strong> {{ $mahasiswa->program_studi }}</div>
                    <div><strong>No. HP:</strong> {{ $mahasiswa->nomor_hp }}</div>
                    <div><strong>Email:</strong> {{ $mahasiswa->email }}</div>
                    <div class="col-span-2"><strong>Alamat:</strong> {{ $mahasiswa->alamat }}</div>
                </div>

                <div class="mt-6">
                    <a href="{{ route('mahasiswa.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>