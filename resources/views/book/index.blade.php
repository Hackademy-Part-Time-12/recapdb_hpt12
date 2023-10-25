<x-layout>
    <div class="container my-5">
        <div class="row">
            <h2 class="text-center">Lista dei libri</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            @if($books->isNotEmpty())
                @foreach ($books as $book)
                    <div class="col-12 col-md-4">
                        <x-card :book="$book" />
                    </div>
                @endforeach
            @else
                <h3>Non ci sono ancora libri</h3>
            @endif
        </div>
    </div>
</x-layout>