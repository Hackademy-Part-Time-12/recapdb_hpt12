<x-layout>
    <h2 class="text-center my-5">Gli ultimi libri inseriti</h2>
    <div class="container my-5">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-12 col-md-4">
                    <x-card :book="$book" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>