@extends('main')

@section('content')
    <p>
        Dnes je <b>{{ $todayName }} {{ $today }}</b><br>
        Meniny má <b>{{ $nameday }}</b>
    </p>
@endsection
