<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-4 gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight md:col-span-3">Quadros</h2>
            <div class="md:col-span-1 text-right">
                <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('dashboard::boards.create') }}">Criar novo quadro</a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid md:grid-cols-3 sm:grid-cols-1 lg:grid-cols-4 gap-4">
                @foreach($boards as $board)
                    <x-board :board="$board"></x-board>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
