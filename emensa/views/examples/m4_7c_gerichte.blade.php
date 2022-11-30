@extends('layout')
@section('content')

    @empty($gericht)
        Keine Gerichte vorhanden
    @endempty
    <ul>
        @foreach($gericht as $key)
            <li>
                {{$key['name']}}
                {{$key['preis_intern']}}
            </li>
        @endforeach
    </ul>
@endsection