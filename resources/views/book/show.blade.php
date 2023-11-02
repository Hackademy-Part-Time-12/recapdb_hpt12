<x-layout>
    <div class="container my-5">
        <div class="row">
            <h2 class="text-center">{{ $book->title }}</h2>
        </div>
    </div>
    <div class="container my-5 p-5 bg-show shadow">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="{{Storage::url($book->cover)}}" alt="{{ $book->title }}" class="img-fluid">
            </div>
            <div class="col-12 col-md-8">
                <h4 class="text-center">Trama</h4>
                <p>{{$book->plot}}</p>
                <h6>Categorie:</h6>
                @if (count($book->categories))
                    <ul>
                        @foreach ($book->categories as $category)
                            <li>{{$category->name}}</li>
                        @endforeach
                    </ul>
                @else
                    <p>Nessuna categoria</p>
                @endif
                <div class="col-12 d-flex justify-content-between">
                    <p>Autore: {{$book->author}}</p>
                    <p>Edito da: {{$book->editor->name ?? 'Nessun editore'}}</p>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <p>Inserito da: {{$book->user->name ?? 'Utente Sconosciuto'}}</p>
                    <p>Inserito il: {{$book->created_at->format('d/m/Y')}}</p>
                </div>
                @auth
                @if ($book->user_id == Auth::user()->id)
                    <div class="col-12 d-flex mt-5 justify-content-evenly">
                        <a href="{{route('book.edit', $book)}}" class="btn btn-warning">Modifica</a>
                        <form action="{{route('book.destroy', $book)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                @endif
                @endauth
            </div>
        </div>
    </div>
</x-layout>