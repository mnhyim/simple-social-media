@extends('layouts.app')
@section('content')
<main class="sm:container sm:mx-auto sm:mt-5 flex flex-align-top">
    <section class="w-2/12 mx-2">
        <div class="p-4 bg-white mb-3 border-1 shadow-md">
            <h1 class="font-bold mb-3">{{ Auth::user()->name }}</h1>
            <p class="text-cool-gray-900">{{ Auth::user()->bio }}</p>
        </div>
    </section>
    <section class="w-10/12 mx-2">
        <div class="py-7 bg-white mb-4 border-1 shadow-md">
            <form class="w-full text-center" action="{{ route('home.store') }}" method="post">
                @csrf
                <input class="w-10/12 form-input rounded-none" type="text" name="posts" id="name" placeholder="Ketikkan sesuatu"> 
                <button class="w-1/12 p-3.5 border border-blue-700 bg-blue-700 text-white hover:bg-blue-800 font-bold" type="submit">Post</button>
            </form>
        </div>
        <div class="p-4 bg-white mt-3 border-1 shadow-md" id="hotels">
            @if ($posts->isNotEmpty())
                @foreach ($posts as $p)
                    <div class="bg-white mb-3 p-3 border-cool-gray-200 border shadow-sm flex flex-row items-center">
                        <h1 class="p-3 font-bold"> {{ $p->poster_id }} </h1>
                        <p class="p-3 text-cool-gray-800 mr-auto">{{ $p->posts }}</p>
                        @if ($p->poster_id == Auth::id())
                            <form action="{{ route('home.destroy', $p->posts_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-700 text-white p-3 font-bold">Delete</button>
                            </form>
                        @endif
                        <form class="mx-2" action="{{ route('home.destroy', $p->posts_id) }}" method="POST">
                            <button class="bg-green-700 text-white p-3 font-bold">Reply</button>
                        </form>
                    </div>
                @endforeach  
            @else
                <h1 class="font-bold text-center">TIDAK ADA POST</h1>
            @endif
            {{ $posts->links() }}

        </div>
    </section>
</main>
@endsection
