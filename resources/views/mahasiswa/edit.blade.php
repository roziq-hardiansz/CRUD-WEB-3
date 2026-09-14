<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block font-medium text-sm text-gray-700">NIM</label>
                            <input type="text" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $mahasiswa->tempat_lahir) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="w-full border-gray-300 rounded-md shadow-sm" required>
                                <option value="L" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Program Studi</label>
                            <input type="text" name="program_studi" value="{{ old('program_studi', $mahasiswa->program_studi) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Nomor HP</label>
                            <input type="text" name="nomor_hp" value="{{ old('nomor_hp', $mahasiswa->nomor_hp) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <div>
                            <label class="block font-medium text-sm text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email', $mahasiswa->email) }}" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block font-medium text-sm text-gray-700">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" required>{{ old('alamat', $mahasiswa->alamat) }}</textarea>
                    </div>

                    <div class="mt-6 flex gap-2">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update</button>
                        <a href="{{ route('mahasiswa.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>