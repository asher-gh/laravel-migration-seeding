<h2>
    Create a new collection for your movies
</h2>

<form action="{{ route('collections.store') }}" method="POST">

    @csrf

    <input type="text" name="name">: Name of collection
    @error('name')
        <div>
            Problem: {{ $message }}
        </div>
    @enderror

</form>