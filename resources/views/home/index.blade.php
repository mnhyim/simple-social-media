@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                Dashboard
            </header>

            <div class="w-full p-6 flex">
                {{-- <p class="text-gray-700">
                    You are logged in!
                </p> --}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <form class="mt-10 mx-auto w-8/12" action="{{ route('home.store') }}" method="post">
                    @csrf
                    <input class="form-input rounded-none w-3/4" type="text" name="posts" id="name">
                    <button class="p-3.5 bg-blue-700 text-white w-2/12" type="submit">Post</button>
                </form>
            </div>
        </section>
    </div>
</main>
@endsection
