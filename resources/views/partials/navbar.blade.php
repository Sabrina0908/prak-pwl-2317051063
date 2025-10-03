<nav class="w-full bg-gradient-to-r from-orange-100 via-orange-200 to-amber-100 shadow-md">
    <div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
        <div class="flex space-x-6">
            <a href="{{ route('user.index') }}" 
               class="text-orange-900 font-medium hover:text-orange-100 transition {{ request()->routeIs('user.index') ? 'underline decoration-2' : '' }}">
                Daftar Pengguna
            </a>
            <a href="{{ route('user.create') }}" 
               class="text-orange-900 font-medium hover:text-orange-100 transition {{ request()->routeIs('user.create') ? 'underline decoration-2' : '' }}">
                Buat Pengguna
            </a>
        </div>
    </div>
</nav>
