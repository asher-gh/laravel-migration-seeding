<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <h1>
        Movies!
        @auth
            Welcome back: {{ Auth::user()->name }}
        @else
            Why not register!
        @endauth
    </h1>
    <h2>
        {{ $message }}
    </h2>

    @if( Auth::user()->can('create', App\Models\Collection::class) )
        <h3>
            <a href="{{ route('collections.create') }}">Create a new collection</a>
        </h3>
    @endif

    @can('create', App\Models\Collection::class)
        <h3>
            <a href="{{ route('collections.create') }}">Create a new collection</a>
        </h3>
    @endcan
        
    @endcannot

    @foreach ($movies as $movie)
        <div>
            <li>{{ $movie->name }}</li>

            @if(Auth::check())
                @foreach ($collections as $collection)
                    <form action="{{ route('collections.movies.store', $collection) }}" method="POST">
                        @csrf
                        <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                        <button>Add to {{ $collection->name }} collection</button>
                    </form>
                @endforeach
            @endif

            <li>
                Directed by: {{ $movie->director->name }},
                who directed {{ $movie->director->movies->count() }} movies
            </li>
            <li>
                Genres:
                @foreach($movie->genres as $genre)
                    {{ $genre->name }},
                @endforeach
            </li>
            <img src="{{ $movie->image_url }}">

        </div>
    @endforeach
</body>
</html>
