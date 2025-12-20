@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-orange-100 via-orange-200 to-amber-100 p-6">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-md p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Edit Mata Kuliah
        </h1>

        <form action="{{ route('matakuliah.update', $mk->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            <div>
                <label for="nama_mk" class="block text-sm font-medium text-gray-700">Nama Mata Kuliah</label>
                <input type="text" id="nama_mk" name="nama_mk" value="{{ old('nama_mk', $mk->nama_mk) }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 p-2.5 text-gray-700"
                    placeholder="Masukkan nama mata kuliah">
            </div>
            <div>
                <label for="sks" class="block text-sm font-medium text-gray-700">SKS</label>
                <input type="number" id="sks" name="sks" value="{{ old('sks', $mk->sks) }}"
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-orange-400 focus:border-orange-400 p-2.5 text-gray-700"
                    placeholder="Masukkan SKS">
            </div>
            <div class="pt-4">
                <button type="submit"
                    class="w-full py-3 rounded-lg font-semibold text-white bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 hover:opacity-90 transition">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection