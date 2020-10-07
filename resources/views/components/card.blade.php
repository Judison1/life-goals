<div class="card mb-3 shadow border-0">
    <div class="card-header d-flex justify-content-between align-items-center">
        {{ $title }}
        <x-dropdown>
            <a href="{{$open}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-blue-500 hover:text-white">
                Abrir card
            </a>
            <a href="{{$edit}}" class="block px-4 py-2 text-sm capitalize text-gray-700 hover:bg-green-500 hover:text-white">
                Editar Card
            </a>
            <form action="{{$remove}}" method="post" class="w-100">
                @csrf
                @method('delete')
                <button type="submit" class="block text-left w-100 px-4 py-2 text-sm capitalize text-gray-700 hover:bg-red-500 hover:text-white">
                    Remover Card
                </button>
            </form>
        </x-dropdown>
    </div>
    @if($card_img)
        <img src="{{ $card_img }}" class="img-fluid" alt="...">
    @endif
    <div class="card-body">

        <p class="card-text">{{ $description }}</p>
{{--        <a href="#" class="btn btn-primary">Go somewhere</a>--}}
    </div>
</div>
