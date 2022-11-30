@extends('layout')
@section('content')
    <ul>
        @foreach($kategorie as $key)
            @if($loop->odd)
            <li style="font-weight:bold;">{{$key['name']}}</li>
            @elseif($loop->even)
            <li>{{$key['name']}}</li>
            @endif
        @endforeach
    </ul>
@endsection