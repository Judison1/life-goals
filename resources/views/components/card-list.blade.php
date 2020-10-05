<div class="shadow-sm bg-white rounded p-2">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h4 class="text-xl">{{$title}}</h4>
        <a class="btn btn-sm btn-outline-success" href="{{route('dashboard::cards.create', ['id' => $id])}}">Add</a>
    </div>
    @foreach($cards as $card)
        <x-card :card="$card"></x-card>
    @endforeach
</div>
