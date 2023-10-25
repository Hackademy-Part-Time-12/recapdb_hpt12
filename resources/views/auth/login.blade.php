<x-layout>
    <div class="container my-5">
        <div class="row">
            <h2 class="text-center">Accedi</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{route('login')}}" method="POST" class="p-5 shadow bg-custom rounded">
                    @csrf
                    <div class="my-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" id="email">
                        @error('email')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password">
                        @error('password')
                            <div class="fst-italic">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                        <label for="remember" class="form-label">Ricordami</label>
                    </div>
                    <button type="submit" class="btn btn-dark">Accedi</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>