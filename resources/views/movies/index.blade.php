<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    @foreach ($movies as $movie)
        <div>
            <li>{{ $movie->name }}</li>
            
            @if(Auth::check())
                <form action="???" method="???">
                    <input type="hidden" name="movie_id" value="?">
                    <select name="collection_id">
                        <option value="id for collection 1">Collection 1 Name here</option>
                        <option value="id for collection 2">Collection 2 Name here</option>
                    </select>
                    <button>Add to collection</button>
                </form>
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