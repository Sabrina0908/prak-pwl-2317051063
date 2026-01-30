@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-100 via-orange-200 to-amber-100 p-6">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Buat Pengguna Baru
        </h1>

        <form action="{{ route('user.store') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="nama" name="nama" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 p-2.5 text-gray-700" 
                    placeholder="Masukkan nama">
            </div>
            <div>
                <label for="npm" class="block text-sm font-medium text-gray-700">NPM</label>
                <input type="text" id="npm" name="npm" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 p-2.5 text-gray-700" 
                    placeholder="Masukkan NPM">
            </div>
            <div>
                <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas</label>
                <select name="kelas_id" id="kelas_id" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 p-2.5 text-gray-700">
                    @foreach ($kelas as $kelasItem)
                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="pt-4">
                <button type="submit" 
                    class="w-full py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:opacity-90 transition">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
