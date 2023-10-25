<x-layout>
    <div class="container my-5">
        <div class="row">
            <h2 class="text-center">Modifica libro</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('book.update', $book)}}" method="POST" class="p-5 shadow bg-custom rounded" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="my-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" value="{{$book->title}}" id="title">
                        @error('title')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="author" class="form-label">Autore</label>
                        <input type="text" class="form-control" name="author" value="{{$book->author}}" id="author">
                        @error('author')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="cover" class="form-label">Copertina attuale</label>
                        <img src="{{Storage::url($book->cover)}}" alt="{{$book->title}}" class=" w-25 img-fluid d-block">
                    </div>
                    <div class="my-3">
                        <label for="cover" class="form-label">Copertina</label>
                        <input type="file" class="form-control" name="cover" id="cover">
                        @error('cover')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="plot" class="form-label">Trama</label>
                        <textarea name="plot" id="plot" cols="30" rows="5" class="form-control">{{$book->plot}}</textarea>
                        @error('plot')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Modifica libro</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>