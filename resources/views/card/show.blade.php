<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $card->title }}</h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded p-6 shadow-sm">
                Descrição: {{ $card->description }}

                @if($card->attachments)
                    <h4 class="text-xl mt-3">Anexos</h4>
                @endif
                @foreach($card->attachments as $attachment)
                    <a class="btn btn-outline-info mt-2" target="_blank" href="{{$attachment->link}}">
                        {{$attachment->file_path}}
                    </a>
                @endforeach
            </div>
        </div>

    </div>
</x-app-layout>
