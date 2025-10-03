@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-orange-100 via-orange-200 to-amber-100 p-6 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-lg w-full max-w-4xl p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">
            Daftar Pengguna
        </h1>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse rounded-lg overflow-hidden shadow-sm">
                <thead>
                    <tr class="bg-gradient-to-r from-orange-400 via-orange-500 to-orange-600 text-white text-left">
                        <th class="px-4 py-3">ID</th>
                        <th class="px-4 py-3">Nama</th>
                        <th class="px-4 py-3">NPM</th>
                        <th class="px-4 py-3">Kelas</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-orange-50 transition">
                            <td class="px-4 py-3 text-gray-700">{{ $user->id }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $user->nama }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $user->nim }}</td>
                            <td class="px-4 py-3 text-gray-700">{{ $user->nama_kelas }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
