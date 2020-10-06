<div class="shadow-sm bg-white rounded p-2">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="text-xl">{{$title}}</h4>
        <x-dropdown>
            <a href="{{$add}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                Adicionar card
            </a>
            <a href="{{$edit}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-green-500 hover:text-white">
                Editar
            </a>
            <form action="{{$remove}}" method="post" class="w-100">
                @csrf
                @method('delete')
                <button type="submit" class="block text-left w-100 px-4 py-2 text-sm capitalize text-gray-700 hover:bg-red-500 hover:text-white">
                    Remover
                </button>
            </form>
        </x-dropdown>
    </div>
    @foreach($cards as $card)
        <x-card :card="$card"></x-card>
    @endforeach
</div>
