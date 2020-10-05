<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-4 gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight md:col-span-2">{{ $board->title }}</h2>
            <div class="md:col-span-2 text-right">
                <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('dashboard::boards.edit', $board) }}">Editar quadro</a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="post" action="{{ route('dashboard::card-lists.store') }}" class="bg-white rounded shadow-sm p-3">
                @csrf
                <input type="hidden" name="board_id" value="{{$board->id}}">
                <label>Adicionar lista:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="input-title" name="title" placeholder="Insira o titulo da lista aqui" required>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
            <div class="grid md:grid-cols-2 sm:grid-cols-1 lg:grid-cols-3 gap-4 py-3">
                @foreach($board->cardLists as $cardList)
                    <x-card-list :cardList="$cardList"/>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
