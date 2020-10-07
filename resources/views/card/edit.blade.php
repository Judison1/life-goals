<x-app-layout >
    <x-slot name="header">
        <div class="d-flex align-items-center">
            <a class="btn btn-outline-light mr-2" href="{{ route('dashboard::boards.show', $card->cardList->board) }}">Voltar</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Criar novo card</h2>
        </div>

    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form method="post" action="{{route('dashboard::cards.update', $card) }}" class="bg-white rounded shadow-sm p-3" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="input-title" class="form-label">Título do card</label>
                    <input type="text" class="form-control" id="input-title" name="title" placeholder="Insira o título aqui"  value="{{ $card->title }}" required>
                    <div id="emailHelp" class="form-text">Campo Obrigatório</div>
                </div>
                <div class="mb-3">
                    <label for="input-description" class="form-label">Descrição</label>
                    <textarea class="form-control" id="input-description" name="description" required>{{ $card->description }}</textarea>
                    <div id="emailHelp" class="form-text">Campo Obrigatório</div>
                </div>
                <div class="mb-3">
                    <label for="input-attachment" class="form-label">Anexos</label>
                    @foreach($card->attachments as $attachment)
                        <div class="input-group mb-3">
                            <input type="text" readonly class="form-control" value="{{$attachment->filename}}" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <a href="{{ route('dashboard::attachments.destroy', $attachment) }}" class="btn btn-danger" type="button">Remover</a>
                        </div>
                    @endforeach
                    <div class="form-file">
                        <input type="file" class="form-file-input" name="attachment" id="input-attachment">
                        <label class="form-file-label" for="customFile">
                            <span class="form-file-text">Escolha o arquivo...</span>
                            <span class="form-file-button">Procurar</span>
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>

        </div>
    </div>
</x-app-layout>
