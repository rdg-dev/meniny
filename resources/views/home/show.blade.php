@extends('main')

@section('content')
    <p>Meno: <b>{{ $name }}</b><br>
        Meniny: <b>{{ $dateNameday }}</b></p>
    <a href="{{ route('homepage') }}">Späť na úvodnú stránku</a>
@endsection
