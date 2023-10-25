<x-layout>
    @auth
        <h1>ciao {{Auth::user()->email}}</h1>
    @endauth
</x-layout>