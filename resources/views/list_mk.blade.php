@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-100 via-orange-200 to-amber-100 p-6 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-4xl p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Daftar Mata Kuliah
        </h1>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse rounded-lg overflow-hidden shadow-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 text-white text-left">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nama Mata Kuliah</th>
                        <th class="px-4 py-3">SKS</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($mks as $mk)
                        <tr class="hover:bg-orange-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $mk->id }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $mk->nama_mk }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $mk->sks }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('matakuliah.edit', $mk->id) }}" 
                                        class="inline-flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-sky-500 to-blue-600 hover:from-sky-600 hover:to-blue-700 transform hover:-translate-y-0.5 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536M9 11l6-6 3 3-6 6H9v-3z"/></svg>
                                        <span>Edit</span>
                                    </a>

                                    <form action="{{ route('matakuliah.destroy', $mk->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-semibold text-white bg-gradient-to-r from-rose-500 to-red-600 hover:from-rose-600 hover:to-red-700 transform hover:translate-y-0.5 transition">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                            <span>Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection