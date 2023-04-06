<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
        <h1 class="text-xl head">Calculator</h1>

        <form action="{{ route('calculator.calculate') }}" method="POST">
            @csrf <!-- {{ csrf_field() }} -->
            <input name="num1" type="number">
            <input name="num2" type="number">

            @php
                $operators = ['+', '-', '/', '*'];
            @endphp

            @foreach ($operators as $operator)
                <input type="radio" name="operation" id="{{ $operator }}" value="{{ $operator }}">
                <label for="{{ $operator }}">{{ $operator }}</label>
            @endforeach

            <button type="submit">calculate</button>

            @error('num1')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            
            @error('num2')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            @error('operation')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </form>

        <h2>Result: {{ $result }}</h2>
</body>

</html>
