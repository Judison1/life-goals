<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Alterar Quadro</h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="post" action="{{ route('dashboard::boards.update', $board) }}" class="bg-white rounded shadow-sm p-3">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="input-title" class="form-label">Título do quadro</label>
                    <input type="text" class="form-control" id="input-title" name="title" placeholder="Insira o titulo aqui" value="{{ $board->title }}" required>
                    <div id="emailHelp" class="form-text">Campo Obrigatório</div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

        </div>
    </div>
</x-app-layout>
