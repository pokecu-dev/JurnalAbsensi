<x-app-layout>
    <!-- Bagian Judul Halaman (Header) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Halaman untuk Admin') }}
        </h2>
    </x-slot>

    <!-- Bagian Konten Utama -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- flex flex-col items-start gap-4 membuat semua isi di dalamnya berjejer lurus ke bawah -->
                <div class="p-6 text-gray-900 flex flex-col items-start gap-4">
                    <div>
                        <h3 class="text-lg font-bold">Halo!</h3>
                        <p class="text-gray-600">admin</p>
                    </div>
                    <!-- Form Logout -->
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg shadow-sm text-sm transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>