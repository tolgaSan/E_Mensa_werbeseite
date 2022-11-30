@extends('layouts')
@section('content')
    <ul>
        @foreach($key as $gericht)
            @if($gericht->preis_intern<2)
            {{$gericht->name}}
            @else
            Es sind keine Gerichte vorhanden
            @endif
        @endforeach
    </ul>
@endsection