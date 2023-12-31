<x-layout>
    <div class="container my-5">
        <div class="row">
            <h2 class="text-center">Inserisci libro</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('book.store')}}" method="POST" class="p-5 shadow bg-custom rounded" enctype="multipart/form-data">
                    @csrf
                    <div class="my-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}" id="title">
                        @error('title')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="author" class="form-label">Autore</label>
                        <input type="text" class="form-control" name="author" value="{{old('author')}}" id="author">
                        @error('author')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="" class="form-label">Editore</label>
                        <select class="form-select" name="editor_id">
                            <option selected disabled>Seleziona editore</option>
                            @foreach ($editors as $editor)
                                <option value="{{$editor->id}}">{{ $editor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-3">
                        <label for="" class="form-label">Categorie</label>
                        <select class="form-select" name="categories[]" multiple>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <small>Crtl/cmd + click per selezione più categorie</small>
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
                        <textarea name="plot" id="plot" cols="30" rows="5" class="form-control">{{old('plot')}}</textarea>
                        @error('plot')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-dark">Inserisci libro</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>