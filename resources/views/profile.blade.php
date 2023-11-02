<x-layout>
    <h2 class="text-center my-5">I libri inseriti da te</h2>
    <div class="container my-5">
        <div class="row">
            @foreach (Auth::user()->books as $book)
                <div class="col-12 col-md-4">
                    <x-card :book="$book" />
                </div>
            @endforeach
        </div>
    </div>
</x-layout>