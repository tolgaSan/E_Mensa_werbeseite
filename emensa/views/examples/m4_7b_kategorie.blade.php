@extends('layout')
@section('content')
    <ul>
        @foreach($key as $kategorie)
            @if($loop->odd)
            <li style="font-weight:bold;">{{$kategorie->name}}</li>
            @elseif($loop->even)
            <li>{{$kategorie->name}}</li>
            @endif
        @endforeach
    </ul>
@endsection