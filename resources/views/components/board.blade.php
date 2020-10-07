<div class="text-white card-board shadow sm:rounded-lg hover:text-white">
    <div class="d-flex justify-content-end">
        <x-dropdown>
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
    <a href="{{ $open }}">
        <div class="text-center mb-8">
            <h4 class="text-2xl font-bold">{{ $title }}</h4>
        </div>
    </a>
</div>
